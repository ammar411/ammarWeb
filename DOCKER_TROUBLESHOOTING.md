# Docker & Render Troubleshooting Guide

## Build Phase Issues

### Error: "COPY failed: file not found"

**Problem:**
```
Step 7/25 : COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY failed: file not found: docker/nginx.conf
```

**Solutions:**
1. Verify files exist in project root:
   ```bash
   ls -la docker/
   # Should show: nginx.conf supervisord.conf entrypoint.sh
   ```

2. Check git hasn't ignored them:
   ```bash
   git status docker/
   ```

3. Rebuild image:
   ```bash
   docker-compose build --no-cache
   ```

---

### Error: "Fatal error: Uncaught Exception"

**Problem:** Composer dependencies missing or version conflict

**Solutions:**
1. Clear composer cache:
   ```bash
   composer clear-cache
   ```

2. Regenerate lock file:
   ```bash
   rm composer.lock
   composer install
   ```

3. Update Dockerfile to use specific composer version:
   ```dockerfile
   RUN composer install --prefer-dist --no-interaction --optimize-autoloader
   ```

---

## Runtime Issues

### Issue: Container Exits Immediately

**Problem:** Supervisord process manager crashes

**Diagnosis:**
```bash
docker logs <container-id>
```

**Common Causes & Fixes:**

1. **PHP-FPM won't start:**
   ```bash
   # Check PHP syntax
   docker run php:8.2-fpm-alpine php -l /var/www/public/index.php
   ```

2. **Nginx config error:**
   ```bash
   docker run -v $(pwd)/docker/nginx.conf:/etc/nginx/nginx.conf \
     nginx:latest nginx -t
   ```

3. **Storage permissions:**
   ```bash
   docker exec <container> ls -la /var/www/storage/
   # Should show www-data as owner
   ```

---

### Issue: "502 Bad Gateway" Error

**Cause:** PHP-FPM not responding to nginx

**Diagnosis:**
```bash
# Check if PHP-FPM is listening
docker exec <container> netstat -tlnp | grep 9000
# Output: tcp  0  0 127.0.0.1:9000  0.0.0.0:*  LISTEN
```

**Fixes:**

1. Restart PHP-FPM:
   ```bash
   docker exec <container> supervisorctl restart php-fpm
   ```

2. Check PHP error logs:
   ```bash
   docker logs <container> 2>&1 | grep -i error
   ```

3. Verify nginx upstream:
   ```bash
   grep "upstream php_fpm" docker/nginx.conf
   # Should show: server 127.0.0.1:9000;
   ```

---

### Issue: Blank White Page or 500 Error

**Cause:** Laravel application error

**Diagnosis:**
```bash
# Check Laravel logs
docker exec <container> tail -f /var/www/storage/logs/laravel.log
```

**Common Causes:**

1. **Missing APP_KEY:**
   ```bash
   docker exec <container> printenv | grep APP_KEY
   # If empty, set in environment
   ```

2. **Database connection failed:**
   ```bash
   docker exec <container> php artisan tinker
   >>> \DB::connection()->getPdo();
   >>> exit;
   ```

3. **Missing migration:**
   ```bash
   docker exec <container> php artisan migrate --force
   ```

---

## Database Issues

### Error: "SQLSTATE[HY000]: General error: 1030 Got error"

**Cause:** Database disk space full or connection timeout

**Solutions:**
```bash
# Check available space (on Render)
# In Render Shell:
$ mysql -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD
mysql> SELECT table_schema, ROUND(SUM(data_length+index_length)/1024/1024, 2) FROM information_schema.tables GROUP BY table_schema;

# If full, archive old data or upgrade plan
```

---

### Error: "Can't connect to MySQL server on 'host' (111)"

**Cause:** Database not accessible, wrong credentials, or network issue

**Solutions:**

1. Verify credentials in Render environment:
   ```bash
   # In Render Shell
   echo $DB_HOST
   echo $DB_USERNAME
   # Compare with your database service
   ```

2. Test connection manually:
   ```bash
   mysql -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD -e "SELECT 1;"
   ```

3. For Render PostgreSQL:
   ```bash
   # Get connection string from Render
   psql $DATABASE_URL -c "SELECT 1;"
   ```

4. Check firewall/whitelist:
   - Render automatically allows outbound connections
   - External databases may need to whitelist Render's IP

---

### Error: "LOCK wait timeout exceeded; try restarting transaction"

**Cause:** Long-running queries blocking others

**Solutions:**

1. Identify locks:
   ```sql
   SHOW OPEN TABLES WHERE In_use > 0;
   SHOW PROCESSLIST;
   ```

2. Kill blocking query:
   ```sql
   KILL <PROCESS_ID>;
   ```

3. Optimize slow queries:
   - Add indexes to frequently queried columns
   - Use EXPLAIN to analyze query plans

4. Increase timeout (last resort):
   ```env
   DB_TIMEOUT=60
   ```

---

## Performance Issues

### Issue: High CPU Usage

**Diagnosis:**
```bash
# View Render metrics
# Check top processes in Render Shell:
$ top -b -n 1 | head -15
```

**Common Causes & Fixes:**

1. **Unoptimized queries:**
   - Enable query logging
   - Identify slow queries
   - Add indexes

2. **Missing caching:**
   ```bash
   docker exec <container> php artisan cache:clear
   docker exec <container> php artisan config:cache
   docker exec <container> php artisan route:cache
   ```

3. **Too many processes:**
   - Reduce `worker_processes` in nginx.conf
   - Reduce PHP-FPM children count

---

### Issue: High Memory Usage

**Solutions:**

1. **Increase timeout for PHP-FPM:**
   ```conf
   [program:php-fpm]
   command=/usr/sbin/php-fpm -F -R
   ; Add:
   ; memory_limit=256M (increase if needed)
   ```

2. **Enable OPcache:**
   ```bash
   # Already enabled in Dockerfile
   docker exec <container> php -i | grep opcache
   ```

3. **Optimize Composer:**
   ```bash
   composer install --optimize-autoloader --no-dev
   ```

---

## Environment & Configuration Issues

### Issue: Environment Variables Not Set

**Diagnosis:**
```bash
# Check what's set
docker exec <container> env | sort

# Check specific variable
docker exec <container> printenv DB_HOST
```

**Solutions:**

1. **In docker-compose.yml:**
   ```yaml
   environment:
     - DB_HOST=mysql
     - DB_PASSWORD=${DB_PASSWORD}
   ```

2. **In Render:**
   - Service → Environment
   - Add/update variables
   - Click "Save"
   - Service redeploys automatically

3. **Verify after restart:**
   ```bash
   docker exec <container> printenv | grep DB_
   ```

---

### Issue: Changes Not Reflected After Deploy

**Cause:** Cache or old image still running

**Solutions:**

1. **Clear all caches:**
   ```bash
   # In Render Shell or locally
   php artisan cache:clear
   php artisan config:cache
   php artisan view:cache
   php artisan route:cache
   ```

2. **Force rebuild on Render:**
   - Dashboard → Service
   - Click "Manual Deploy" → "Deploy latest commit"

3. **Clear Docker cache locally:**
   ```bash
   docker-compose build --no-cache
   docker-compose up --force-recreate
   ```

---

## File & Permission Issues

### Issue: "Permission denied" on storage/logs

**Cause:** Incorrect file ownership

**Solutions:**

1. **In container:**
   ```bash
   docker exec <container> chown -R www-data:www-data /var/www/storage
   docker exec <container> chmod -R 755 /var/www/storage
   ```

2. **In Dockerfile (add to COPY step):**
   ```dockerfile
   RUN chown -R www-data:www-data /var/www/storage
   ```

3. **Verify permissions:**
   ```bash
   docker exec <container> ls -la /var/www/storage/
   ```

---

### Issue: "Cannot create upload directory"

**Cause:** Storage path doesn't exist or wrong permissions

**Solutions:**

1. **Ensure directory exists:**
   ```bash
   docker exec <container> mkdir -p /var/www/storage/uploads
   docker exec <container> chown www-data:www-data /var/www/storage/uploads
   ```

2. **For production, use S3:**
   ```env
   FILESYSTEM_DRIVER=s3
   AWS_ACCESS_KEY_ID=xxxxx
   AWS_SECRET_ACCESS_KEY=xxxxx
   AWS_DEFAULT_REGION=us-east-1
   AWS_BUCKET=mybucket
   ```

---

## Networking Issues

### Issue: Cannot Connect to External Service

**Cause:** Network configuration or firewall

**Solutions:**

1. **Test connectivity from container:**
   ```bash
   docker exec <container> curl -v https://api.example.com
   ```

2. **Check DNS resolution:**
   ```bash
   docker exec <container> nslookup api.example.com
   ```

3. **For Render outbound access:**
   - All outbound connections are allowed
   - Check if service requires IP whitelist

---

## Logging & Monitoring

### Issue: Can't Find Error Messages

**Solutions:**

1. **View container logs:**
   ```bash
   docker logs <container-id> --tail 100 --follow
   ```

2. **View specific service logs:**
   ```bash
   docker exec <container> tail -f /var/log/supervisor/php-fpm.log
   docker exec <container> tail -f /var/log/supervisor/nginx.log
   ```

3. **View Laravel logs:**
   ```bash
   docker exec <container> tail -f /var/www/storage/logs/laravel.log
   ```

4. **Enable debug mode (ONLY IN DEV):**
   ```env
   APP_DEBUG=true
   LOG_LEVEL=debug
   ```

---

## Quick Diagnostic Commands

```bash
# Overall container health
docker ps -a

# Full container logs
docker logs <container-id>

# Check if app is responding
curl http://localhost:8080

# PHP version
docker exec <container> php -v

# Laravel version
docker exec <container> php artisan --version

# Check environment
docker exec <container> env | sort

# Check processes
docker exec <container> ps aux

# Check disk usage
docker exec <container> df -h

# Check memory
docker exec <container> free -h

# Check services status
docker exec <container> supervisorctl status
```

---

## Render-Specific Troubleshooting

### Render Health Check Failing

**Problem:** "Health Check Failed" in Render dashboard

**Solutions:**

1. **Check healthcheck endpoint:**
   - Dockerfile defines: `curl -f http://localhost:8080/`
   - Ensure `/` returns HTTP 200

2. **Increase timeout:**
   ```dockerfile
   HEALTHCHECK --interval=30s --timeout=15s --start-period=10s --retries=5 \
     CMD curl -f http://localhost:8080/ || exit 1
   ```

3. **Check service logs:**
   - Render → Logs tab
   - Look for health check failures

### Render Deployment Stuck

**Solutions:**

1. **Cancel and retry:**
   - Dashboard → Service
   - Click "Deployments" → Cancel stuck deployment
   - Manual Deploy again

2. **Check build logs:**
   - Service → Logs → "Build"
   - Look for specific error

3. **Check Docker image size:**
   - Alpine should be ~500MB
   - If larger, something is cached

---

## Getting Help

**Before reporting issues:**
1. ✓ Check logs with tail commands
2. ✓ Verify environment variables set
3. ✓ Test locally with docker-compose
4. ✓ Run health checks
5. ✓ Check permissions on files

**Report with:**
- Full error message from logs
- Steps to reproduce
- Environment configuration (sans passwords)
- Output from diagnostic commands above
