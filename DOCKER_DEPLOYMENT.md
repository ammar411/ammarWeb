# Docker Deployment Guide

This guide covers building and deploying your Laravel application using Docker on Render.

## Overview

The Docker setup includes:
- **PHP 8.2-FPM** on Alpine Linux (lightweight, secure)
- **Nginx** web server with optimized configuration
- **Supervisor** managing both PHP-FPM and Nginx processes
- **OPcache** enabled for production performance
- **Security headers** and HTTPS redirect support
- **Health checks** for container orchestration

## Local Development

### Prerequisites
- Docker & Docker Compose installed
- `.env` file configured with database credentials

### Building Locally

```bash
# Build the image
docker-compose build

# Start services
docker-compose up -d

# Run migrations
docker-compose exec app php artisan migrate

# View logs
docker-compose logs -f app
```

Visit `http://localhost:8080` in your browser.

### Stopping Services

```bash
docker-compose down
```

## Render Deployment

### Step 1: Connect Repository

1. Go to [render.com](https://render.com)
2. Click "New +" → "Web Service"
3. Connect your GitHub repository
4. Select the repository containing this Dockerfile

### Step 2: Configure Environment

In the Render dashboard:

1. **Name**: Give your service a name (e.g., `laravel-portfolio`)
2. **Environment**: `Docker`
3. **Plan**: Free (or your preferred plan)
4. **Region**: Select nearest region

### Step 3: Add Environment Variables

Set these in Render's environment variables section:

```
APP_KEY=base64:GENERATED_KEY_HERE
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.onrender.com

DB_HOST=your-database-host
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

MAIL_MAILER=log
LOG_CHANNEL=stderr
```

**To generate APP_KEY:**
```bash
php artisan key:generate --show
```

### Step 4: Configure Database (if using external MySQL)

The application expects a MySQL database. Options:

**Option A: Render's PostgreSQL (Recommended)**
- Create a PostgreSQL service on Render
- Update `.env` to use PostgreSQL connection
- Uncomment `pdo_pgsql` in Dockerfile if needed

**Option B: External MySQL Provider**
- Use Planetscale, AWS RDS, or similar
- Set `DB_HOST`, `DB_USERNAME`, `DB_PASSWORD`

**Option C: SQLite (Simple, but limited)**
```env
DB_CONNECTION=sqlite
```

### Step 5: Deploy

1. Click "Create Web Service"
2. Render automatically builds and deploys when you push to your branch
3. Access your app at `https://your-app.onrender.com`

## Docker Image Details

### Base Image: `php:8.2-fpm-alpine`

**Benefits:**
- Lightweight (only ~200MB vs 800MB+ for other variants)
- Faster startup and deployment
- Alpine Linux provides robust security

### Extensions Installed

| Extension | Purpose |
|-----------|---------|
| `pdo` | Database abstraction |
| `pdo_mysql` | MySQL support |
| `pdo_pgsql` | PostgreSQL support |
| `bcmath` | Encryption, hashing |
| `opcache` | PHP opcode caching (60% faster!) |

### Configuration Files

#### `Dockerfile`
- Installs dependencies: nginx, supervisor, composer
- Sets up Laravel directory structure
- Configures OPcache for production
- Sets proper file permissions
- Runs health checks

#### `docker/nginx.conf`
- Listens on port 8080 (Render requirement)
- Handles Laravel routing with `try_files`
- Compresses responses with gzip
- Caches static assets (1 year expiry)
- Enforces security headers
- Blocks access to `.env` and sensitive files

#### `docker/supervisord.conf`
- Manages PHP-FPM and Nginx as separate processes
- Auto-restarts if either crashes
- Logs to `/var/log/supervisor/`

## Production Optimizations

### Performance

1. **OPcache Enabled**
   - Pre-compiles PHP opcodes
   - ~60% faster response times
   - Configured in Dockerfile

2. **Gzip Compression**
   - Compresses text, CSS, JS (level 6)
   - Reduces bandwidth by ~70%

3. **Static Asset Caching**
   - 1-year cache headers for `.js`, `.css`, `.png`, etc.
   - Client browsers cache assets locally

### Security

1. **Security Headers**
   ```
   X-Frame-Options: SAMEORIGIN
   X-XSS-Protection: 1; mode=block
   X-Content-Type-Options: nosniff
   Content-Security-Policy: default-src 'self'
   ```

2. **Sensitive File Protection**
   - `.env` file blocked from web access
   - `.git` directory inaccessible
   - `/storage` directory protected

3. **HTTPS Redirect**
   - Automatically redirects HTTP to HTTPS
   - Works with Render's SSL certificates

## Troubleshooting

### Container Won't Start

**Check logs:**
```bash
docker logs <container-id>
```

**Common issues:**
- Missing `APP_KEY` → Run `php artisan key:generate --show`
- Wrong `DB_HOST` → Use hostname, not localhost
- Port 8080 already in use → Change port in docker-compose

### Database Connection Errors

1. Verify `DB_HOST`, `DB_USERNAME`, `DB_PASSWORD` are correct
2. Check if database server is accessible
3. Ensure database name exists
4. For MySQL: user needs `ALL PRIVILEGES`

### Deployment to Render Fails

1. Check Render deployment logs: Dashboard → Service → Logs
2. Verify all environment variables are set
3. Ensure `.env` file is in `.gitignore` (sensitive data protection)
4. Check Docker build context (shouldn't include `vendor/` or `node_modules/`)

## Scaling Considerations

### For Production (Higher Plans)

1. **Use External Database**
   - Render PostgreSQL or AWS RDS
   - Not file-based storage

2. **Use Object Storage**
   - Move `storage/app/public` to S3 or similar
   - Update Laravel config

3. **Enable Queues** (Optional)
   - Run separate queue worker with Supervisor
   - Add to supervisord.conf:
   ```
   [program:laravel-queue]
   command=php /var/www/artisan queue:work
   ```

4. **Use Redis** (Optional)
   - For caching and sessions
   - Add to docker-compose.yml

## Maintenance

### Updating Application

```bash
# Pull latest code
git pull origin main

# Render automatically rebuilds and deploys
```

### Running Artisan Commands

On Render (one-off commands):
```bash
# Via Render dashboard → Shell
php artisan migrate
php artisan cache:clear
```

Locally:
```bash
docker-compose exec app php artisan <command>
```

### Viewing Logs

**Render Dashboard:**
- Service → Logs tab

**Locally:**
```bash
docker-compose logs -f app
```

## Best Practices

✅ **DO:**
- Use environment variables for secrets
- Enable OPcache in production
- Set `APP_DEBUG=false` in production
- Use strong database passwords
- Keep Docker image updated
- Monitor Render's free tier limits

❌ **DON'T:**
- Commit `.env` to git
- Run `composer install` in production container
- Store files in container (use external storage)
- Disable security headers
- Use `php:8.2-fpm` (larger image size)

## Support & Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Render Documentation](https://render.com/docs)
- [Docker Documentation](https://docs.docker.com)
- [Nginx Documentation](https://nginx.org/en/docs/)
