# Quick Render Deployment Checklist

Before deploying to Render, verify these items:

## Pre-Deployment Checklist

### 1. Local Testing ✓
- [ ] `docker-compose up` works without errors
- [ ] Application accessible at `http://localhost:8080`
- [ ] Database migrations run successfully
- [ ] All routes tested locally
- [ ] No sensitive data in `.env` (should be in `.env.example`)

### 2. Code Repository ✓
- [ ] All code committed to Git
- [ ] `.env` file in `.gitignore`
- [ ] `.dockerignore` present (excludes vendor, node_modules, etc.)
- [ ] Main branch is clean and production-ready
- [ ] No merge conflicts

### 3. Environment Configuration ✓
- [ ] `APP_KEY` generated: `php artisan key:generate --show`
- [ ] `DB_CONNECTION` decided (MySQL, PostgreSQL, or SQLite)
- [ ] External database created (if not using Render's PostgreSQL)
- [ ] Database credentials verified working locally

### 4. Render Setup ✓
- [ ] Create Render account at [render.com](https://render.com)
- [ ] Connect GitHub account to Render
- [ ] Grant repository access permissions

## Step-by-Step Render Deployment

### 1. Create Web Service

```
Render Dashboard → New+ → Web Service → Select Repository
```

**Configuration:**
- Name: `laravel-portfolio` (or your choice)
- Environment: `Docker`
- Plan: `Free` (or paid if needed)
- Region: Closest to your users

### 2. Add Environment Variables

In Render dashboard, add these under "Environment":

```
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:YOUR_KEY_HERE
APP_URL=https://your-app-name.onrender.com

DB_CONNECTION=mysql
DB_HOST=your-db-host.com
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=db_user
DB_PASSWORD=secure_password

MAIL_MAILER=log
LOG_CHANNEL=stderr
```

### 3. Set Build Command (Optional)

Most Laravel apps don't need this (Dockerfile handles it):
```
Leave blank unless you have custom needs
```

### 4. Set Start Command (Optional)

Leave blank - Dockerfile's CMD handles startup.

### 5. Deploy

Click "Create Web Service" → Wait for build to complete

Build usually takes 5-15 minutes. View logs in Render dashboard:
```
Service → Logs tab
```

### 6. First-Time Setup (After Deployment)

Once app is running, run migrations via Render Shell:

```
Service → Shell (top right)

$ php artisan migrate --force
$ php artisan cache:clear
$ php artisan config:cache
```

Or set environment variable before deploying:
```
RUN_MIGRATIONS=true
```

## Post-Deployment Verification

### Test Your Application

- [ ] Visit `https://your-app-name.onrender.com`
- [ ] Check homepage loads
- [ ] Test contact form (if exists)
- [ ] Verify styling/assets load correctly
- [ ] Check nginx logs for errors

### Monitor Performance

Render Dashboard → Metrics:
- [ ] CPU usage reasonable (< 80%)
- [ ] Memory usage acceptable (< 80%)
- [ ] Response times < 500ms

### Check Logs

Render Dashboard → Logs:
- [ ] No PHP errors
- [ ] No nginx errors
- [ ] No database connection issues

## Common Issues & Solutions

### Build Fails: "COPY failed"
**Cause:** Files referenced in Dockerfile don't exist
**Solution:** Verify `docker/nginx.conf` and `docker/supervisord.conf` exist

### 502 Bad Gateway
**Cause:** PHP-FPM not responding or nginx misconfigured
**Solution:** Check logs, verify database connection

### Blank Page or 500 Error
**Cause:** Missing APP_KEY or database not accessible
**Solution:** Set all env vars, verify DB credentials

### Slow Performance
**Cause:** OPcache not working or queries too slow
**Solution:** Enable query logging, check database indexes

### Can't Connect to Database
**Cause:** DB_HOST incorrect or database not accessible
**Solution:** Use full hostname (not localhost), whitelist Render IP

## Environment Variables Reference

| Variable | Example | Notes |
|----------|---------|-------|
| `APP_ENV` | `production` | Never use `local` in production |
| `APP_DEBUG` | `false` | Must be `false` in production |
| `APP_KEY` | `base64:xxx...` | Generate with `php artisan key:generate --show` |
| `APP_URL` | `https://yourapp.onrender.com` | Must use HTTPS |
| `DB_CONNECTION` | `mysql` | Options: mysql, pgsql, sqlite |
| `DB_HOST` | `mysql.example.com` | Use full hostname, not localhost |
| `DB_USERNAME` | `user` | Database user |
| `DB_PASSWORD` | `secure_pass` | Keep it secure! |
| `LOG_CHANNEL` | `stderr` | Render requires stderr for logs |
| `MAIL_MAILER` | `log` | Start with log, add SMTP later |

## Scaling Beyond Free Tier

### When to Upgrade

- [ ] Traffic > 100,000 requests/month
- [ ] Need persistent storage
- [ ] Database growing > 1GB
- [ ] Need multiple instances

### Upgrade Steps

1. Render Dashboard → Select Service
2. Click "Instance Type" → Choose paid plan
3. Scale to multiple instances if needed
4. Move database to Render PostgreSQL (recommended)

## Database Backup

### Before Upgrading Database

```bash
# Export from current database
mysqldump -h HOST -u USER -p DB_NAME > backup.sql

# Import to new database
mysql -h NEW_HOST -u USER -p NEW_DB < backup.sql
```

## Monitoring & Maintenance

### Daily Checks
- [ ] Check Render metrics for errors
- [ ] Review logs for warnings
- [ ] Test critical user flows

### Weekly Checks
- [ ] Check storage usage
- [ ] Review database query performance
- [ ] Check backup status

### Monthly Tasks
- [ ] Update dependencies: `composer update`
- [ ] Review security logs
- [ ] Test recovery procedures

## Useful Render Dashboard Shortcuts

| Task | Location |
|------|----------|
| View Logs | Service → Logs |
| Restart App | Service → More (⋮) → Restart |
| View Metrics | Service → Metrics |
| SSH/Shell | Service → Shell button |
| Update Env | Service → Environment |
| View Health | Service → Health (top) |

## Support & Help

- **Render Support:** help.render.com
- **Laravel Docs:** laravel.com/docs
- **Docker Docs:** docs.docker.com
- **Nginx Docs:** nginx.org/en/docs

## Success Indicators

✅ App is live and accessible
✅ No 500 errors in logs
✅ Database queries execute quickly
✅ Assets (CSS/JS) load properly
✅ Contact form/dynamic features work
✅ CPU usage < 50% average
✅ Response time < 300ms

## Next Steps After Deployment

1. **Set up custom domain:**
   - Render → Settings → Custom Domain
   - Add DNS records from Render

2. **Enable HTTPS (automatic on Render)**
   - Already included with render.com domain
   - Works with custom domains too

3. **Set up monitoring:**
   - Check Render's status page
   - Set up email alerts (Render Pro feature)

4. **Schedule backups:**
   - Enable auto-backups if using Render DB
   - Export database monthly

5. **Monitor costs:**
   - Free tier: $0/month
   - Paid tier: typically $7+/month per service
   - Database: $7+/month if separate instance
