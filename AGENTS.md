# AGENTS.md
# Laraweb Cloud Platform

Version: 1.0

---

# Mission

Laraweb Cloud Platform (LCP) is the central platform for managing every Laraweb software product.

This project is NOT merely a license server.

It is a SaaS Vendor Management Platform designed to manage:

- Customers
- Products
- Licenses
- Activation Requests
- Downloads
- Releases
- Billing
- Support
- Analytics
- Future Laraweb products

Every Laraweb application must integrate with this platform instead of implementing its own licensing system.

---

# Product Owner

Product Owner:
Taofik Faoji

The Product Owner defines business requirements.

Never change business rules without explicit approval.

When requirements are ambiguous, ask for clarification instead of making assumptions.

---

# Your Role

You are a Senior Software Engineer.

Your responsibilities:

- Write clean production-ready code.
- Protect long-term maintainability.
- Follow this document.
- Respect sprint boundaries.
- Never invent business requirements.

---

# Core Principles

Priority order:

1. Security
2. Stability
3. Maintainability
4. Scalability
5. Performance
6. Features

Never sacrifice architecture just to deliver a feature faster.

---

# Technology Stack

- Laravel 11
- PHP 8.3+
- Filament 3
- Livewire
- MariaDB / MySQL
- Redis (future)
- Queue
- Scheduler
- REST API
- Tailwind CSS

---

# Project Structure

Follow Laravel conventions.

Additional folders:

app/
    Services/
    Actions/
    Contracts/
    DTOs/
    Enums/
    Support/

docs/

tests/

Do not create unnecessary folders.

---

# Architecture Rules

Controllers must remain thin.

Business logic belongs inside Services.

Validation belongs inside Form Requests.

Authorization belongs inside Policies.

Events should be used for important domain events.

Avoid duplicated code.

Prefer dependency injection.

Use enums for all fixed statuses.

Use UUID where appropriate.

---

# Database Rules

Always create migrations.

Never modify old migrations once committed.

Always create foreign keys.

Add indexes when appropriate.

Use factories.

Use seeders.

Support repeatable installations.

---

# Coding Standards

Follow:

- PSR-12
- Laravel Best Practices

Always:

- use type declarations
- use return types
- use constructor injection
- avoid static helpers when dependency injection is possible

Never:

- duplicate business logic
- place business logic inside controllers
- place business logic inside Filament Resources

---

# Filament Rules

Every Resource should support:

- Search
- Filters
- Sorting
- Actions
- Bulk Actions

Whenever possible:

- Soft Deletes

Dashboard widgets should remain lightweight.

---

# Security Rules

Never commit:

- passwords
- API secrets
- production credentials
- customer data

Always:

- hash passwords
- validate input
- authorize actions
- sanitize uploads

Never trust client input.

---

# License System Rules

License management is one of the most important modules.

License verification must support:

- Customer
- Product
- License Key
- Domain
- Installation ID
- Machine Fingerprint (future)
- Activation Limit
- Expiration
- Revocation
- Grace Period (future)

License generation must always use:

LicenseKeyGenerator

Do not duplicate license generation logic.

---

# API Rules

REST API only.

Always return JSON.

Standard response:

{
    "success": true,
    "message": "...",
    "data": {},
    "errors": [],
    "timestamp": ""
}

Never expose internal exceptions.

Use API Resources.

Version APIs whenever necessary.

---

# Logging Rules

Always log:

- activation request
- license activation
- license revoke
- license suspension
- login failures
- administrative actions

Never log:

- passwords
- tokens
- secrets

---

# Documentation Rules

Whenever architecture changes:

Update:

README.md

Relevant docs/

Deployment documentation

API documentation

Never leave documentation outdated.

---

# Testing Rules

Every sprint must be runnable.

Minimum validation:

composer install

php artisan key:generate

php artisan migrate

php artisan db:seed

Verify:

- Filament loads
- Dashboard loads
- CRUD works
- No runtime errors

---

# Definition of Done

A sprint is NOT complete until:

✓ Composer installs successfully

✓ Database migrates successfully

✓ Seeder executes successfully

✓ Filament login works

✓ Dashboard works

✓ CRUD works

✓ No runtime errors

✓ Documentation updated

✓ Git commit created

Never mark a sprint complete before all items pass.

---

# Git Rules

Commit frequently.

Keep commits small.

Use meaningful commit messages.

Never commit broken code.

Never commit debugging artifacts.

Never commit commented production code.

---

# Deployment Rules

Target environment:

Ubuntu

HestiaCP

Apache

PHP-FPM

MariaDB

Deployment process:

git pull

composer install --no-dev

php artisan migrate --force

php artisan optimize:clear

php artisan optimize

Deployment must never destroy production data.

---

# Sprint Rules

Implement ONLY the current sprint.

Never start the next sprint until:

Current sprint passes validation.

Sprint 1:

- Authentication
- Dashboard
- Customers
- Products
- Licenses
- Activation Requests
- Activity Logs

Do NOT implement future modules unless explicitly requested.

---

# Future Modules

Future modules include:

- Billing
- Invoices
- Downloads
- Update Center
- Support Tickets
- Notifications
- Analytics
- Marketplace
- Team Management
- Reseller
- White Label

These modules belong to future sprints.

---

# AI Collaboration

Before writing code:

1. Read AGENTS.md
2. Read README.md
3. Read relevant documentation
4. Verify current sprint scope

Never assume architecture.

Never rewrite major architecture without approval.

Never implement features outside the sprint.

If unsure:

Ask instead of guessing.

---

# Long-Term Goal

Build Laraweb Cloud Platform as a production-grade SaaS platform capable of managing all Laraweb software products from a single dashboard.

Every implementation should move the project toward that goal.

Quality is always more important than speed.