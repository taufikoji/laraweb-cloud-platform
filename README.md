# Laraweb Cloud Platform

Laraweb Cloud Platform is a Laravel 11 SaaS Vendor Management Platform for Laraweb products. Sprint 1 provides the Filament admin foundation for customers, products, licenses, activation requests, activity logs, sample data, and a dashboard.

## Sprint 1 modules

- Customer management
- Product management
- License management
- Activation request approval/rejection
- Activity logs
- Filament admin dashboard widgets

Future modules such as billing, update center, support tickets, marketplace, reseller management, and advanced analytics are intentionally not implemented yet.

## Requirements

- PHP 8.3 or newer
- Composer
- MySQL or MariaDB
- Node.js and npm if you customize frontend assets

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Configure your database in `.env`, then run migrations and seeders:

```bash
php artisan migrate --seed
```

## Environment variables

Important local variables:

```dotenv
APP_NAME="Laraweb Cloud Platform"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laraweb_cloud_platform
DB_USERNAME=root
DB_PASSWORD=

FILAMENT_ADMIN_EMAIL=admin@laraweb.cloud
FILAMENT_ADMIN_PASSWORD=password
```

## Admin user

The initial admin seeder creates:

- Email: `admin@laraweb.cloud`
- Password: `password`

You can also create a Filament user manually after dependencies are installed:

```bash
php artisan make:filament-user
```

## Running migrations

```bash
php artisan migrate
php artisan db:seed
```

For a fresh local database:

```bash
php artisan migrate:fresh --seed
```

## Accessing Filament admin

Start the local development server:

```bash
php artisan serve
```

Open the admin panel at:

```text
http://localhost:8000/admin
```

Login with the seeded admin credentials above.

## Deployment notes

1. Set production environment variables securely on the server.
2. Run `composer install --no-dev --optimize-autoloader`.
3. Run `php artisan key:generate` once if `APP_KEY` is not already set.
4. Run `php artisan migrate --force` during deployment.
5. Cache configuration and routes with `php artisan config:cache` and `php artisan route:cache`.
6. Ensure HTTPS is enforced by the web server or platform load balancer.
