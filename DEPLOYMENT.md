# DEPLOYMENT.md

# Laraweb Cloud Platform

Deployment Guide

Version 1.0

---

# Purpose

This document defines the official deployment process for Laraweb Cloud Platform.

The objectives are:

- Repeatable deployments
- Minimal downtime
- Safe database migrations
- Easy rollback
- Consistent production environments

Every deployment should follow this guide.

---

# Production Environment

Operating System

- Ubuntu 24.04 LTS

Web Server

- Apache

Control Panel

- HestiaCP

PHP

- PHP 8.3+

Database

- MariaDB

SSL

- Let's Encrypt

Source Control

- GitHub

---

# Directory Structure

Example

```
/home/laraweb/web/panel.laraweb.cloud/public_html/
```

Application

```
panel.laraweb.cloud
```

Storage

```
storage/
```

Public

```
public/
```

---

# Deployment Strategy

Deployment must always be performed using Git.

Never upload project files manually.

Preferred workflow:

Developer

↓

GitHub

↓

Production Server

↓

git pull

↓

Composer

↓

Migration

↓

Optimization

---

# Initial Deployment

Clone repository

```
git clone <repository-url>
```

Enter project

```
cd panel.laraweb.cloud
```

Install dependencies

```
composer install
```

Create environment

```
cp .env.example .env
```

Generate application key

```
php artisan key:generate
```

Run migrations

```
php artisan migrate
```

Seed demo data (development only)

```
php artisan db:seed
```

Optimize

```
php artisan optimize
```

---

# Production Deployment

Pull latest changes

```
git pull origin main
```

Install production dependencies

```
composer install --no-dev --optimize-autoloader
```

Run migrations

```
php artisan migrate --force
```

Clear caches

```
php artisan optimize:clear
```

Rebuild caches

```
php artisan optimize
```

Restart queues (future)

```
php artisan queue:restart
```

---

# Environment Variables

Sensitive information must exist only in `.env`.

Never commit:

- APP_KEY
- Database Password
- Mail Password
- API Keys
- OAuth Secrets
- Payment Credentials

---

# File Permissions

Recommended ownership

```
laraweb:www-data
```

Writable directories

```
storage/

bootstrap/cache/
```

---

# Database Backup

Always create a backup before deployment.

Recommended:

Daily

Weekly

Monthly

Store encrypted backups.

---

# Rollback Strategy

If deployment fails:

1. Restore database backup.

2. Checkout previous Git commit.

```
git checkout <previous-commit>
```

3. Reinstall dependencies.

4. Optimize application.

5. Verify system.

---

# Release Checklist

Before deployment:

✓ Code reviewed

✓ Documentation updated

✓ Migration reviewed

✓ Backup completed

✓ Environment verified

✓ Tests passed

After deployment:

✓ Login works

✓ Dashboard loads

✓ CRUD works

✓ API works

✓ Logs checked

---

# Zero Downtime

Future versions should support:

- Maintenance mode
- Queue workers
- Blue/Green deployment
- CI/CD pipeline

---

# Deployment Rules

Never deploy directly from local files.

Never edit production code through File Manager.

Never deploy without Git.

Never deploy without backup.

Never deploy without validation.

---

# Monitoring

After deployment verify:

- Web server
- PHP
- Database
- Queue
- Scheduler
- Logs

Monitor:

```
storage/logs/laravel.log
```

---

# Production Checklist

Infrastructure

✓ SSL

✓ Firewall

✓ SSH Key Authentication

✓ Automatic Backups

✓ HTTPS Redirect

Application

✓ APP_ENV=production

✓ APP_DEBUG=false

✓ Cache enabled

✓ Optimized autoloader

Database

✓ Backup completed

✓ Migration completed

✓ Performance verified

---

# Future CI/CD

Future deployment pipeline:

Developer

↓

GitHub

↓

GitHub Actions

↓

SSH

↓

Production VPS

↓

Deployment Script

↓

Health Check

↓

Deployment Complete

---

# Final Principle

Every deployment must be:

Safe

Repeatable

Documented

Recoverable

Reliable

Manual file uploads are considered an emergency procedure only, not the standard deployment method.
