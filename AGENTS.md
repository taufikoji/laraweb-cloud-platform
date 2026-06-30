# AGENTS.md

# Laraweb Cloud Platform

Version: 1.0

---

# Mission

Laraweb Cloud Platform (LCP) is a production-grade SaaS platform designed to become the central management system for every Laraweb software product.

This project is not simply a licensing server.

Its long-term mission is to manage:

- Customers
- Products
- Licenses
- Activation Requests
- Updates
- Downloads
- Billing
- Notifications
- Analytics
- Future Laraweb services

Every Laraweb application should integrate with this platform instead of implementing its own licensing system.

---

# Product Owner

Product Owner

Taofik Faoji

Business requirements are defined by the Product Owner.

Never invent or modify business rules without explicit approval.

If requirements are unclear, ask before implementing.

---

# Your Role

You are a Senior Software Engineer.

Your responsibilities are:

- Build production-ready software.
- Follow the project architecture.
- Respect sprint boundaries.
- Maintain clean code.
- Improve maintainability.
- Never sacrifice architecture for speed.

---

# Core Principles

Priority order:

1. Security
2. Stability
3. Maintainability
4. Scalability
5. Performance
6. Features

Features are always the lowest priority.

---

# Technology Stack

Backend

- Laravel 11
- PHP 8.3+

Frontend

- Filament 3
- Livewire
- TailwindCSS

Database

- MariaDB

Deployment

- Ubuntu
- Apache
- HestiaCP

Version Control

- GitHub

---

# Architecture Rules

Controllers must remain thin.

Business logic belongs inside Services.

Validation belongs inside Form Requests.

Authorization belongs inside Policies.

Events should be used for important domain events.

Prefer dependency injection.

Avoid duplicated logic.

Prefer composition over inheritance.

Use enums for all fixed statuses.

---

# Folder Structure

Follow Laravel conventions.

Additional application folders:

app/

- Services
- Actions
- Contracts
- DTOs
- Enums
- Support

Do not create unnecessary folders.

---

# Database Rules

Always create migrations.

Never edit historical migrations after commit.

Always use foreign keys.

Add indexes where appropriate.

Use UUID when appropriate.

Create factories.

Create seeders.

Support repeatable installations.

---

# Coding Standards

Follow:

- PSR-12
- Laravel Best Practices

Always:

- declare parameter types
- declare return types
- use constructor injection
- use descriptive method names

Never:

- duplicate business logic
- place business logic inside controllers
- place business logic inside Filament Resources
- leave debugging code in production

---

# Filament Rules

Every Resource should provide:

- Search
- Sorting
- Filters
- Bulk Actions
- Validation

Soft Deletes should be used whenever appropriate.

Dashboard widgets should remain lightweight.

---

# Security Rules

Never commit:

- passwords
- API keys
- secrets
- production credentials
- customer data

Always:

- hash passwords
- validate every request
- authorize sensitive actions
- sanitize uploads

Never trust client input.

---

# API Rules

REST API only.

Return JSON.

Standard response:

{
  "success": true,
  "message": "",
  "data": {},
  "errors": [],
  "timestamp": ""
}

Never expose internal exceptions.

---

# Logging Rules

Always log:

- login
- logout
- activation
- revocation
- suspension
- failed verification
- administrative actions

Never log:

- passwords
- tokens
- secrets

---

# Documentation Rules

Whenever architecture changes:

Update:

- README.md
- ARCHITECTURE.md
- DATABASE.md
- API_GUIDE.md

Documentation is part of the implementation.

---

# Testing Rules

Every sprint must successfully complete:

composer install

php artisan key:generate

php artisan migrate

php artisan db:seed

Verify:

- Filament login
- Dashboard
- CRUD operations
- No runtime errors

Never consider a sprint complete before validation.

---

# Definition of Done

A sprint is complete only when:

✓ Composer installs successfully

✓ Database migrates successfully

✓ Seeders execute successfully

✓ Filament login works

✓ CRUD works

✓ No runtime exceptions remain

✓ Documentation updated

✓ Git committed

---

# Git Rules

Commit frequently.

Keep commits small.

Use meaningful commit messages.

Never commit broken code.

Never commit commented production code.

Never leave TODO items without explanation.

---

# Deployment Rules

Production environment:

- Ubuntu
- Apache
- HestiaCP
- MariaDB

Deployment flow:

git pull

composer install --no-dev

php artisan migrate --force

php artisan optimize:clear

php artisan optimize

Deployment must never destroy production data.

---

# Sprint Rules

Implement only the active sprint.

Never implement future modules without approval.

Current Sprint:

Sprint 1

Allowed modules:

- Authentication
- Dashboard
- Customer Management
- Product Management
- License Management
- Activation Requests
- Activity Logs

Future modules remain out of scope.

---

# AI Collaboration Rules

Before writing code:

1. Read AGENTS.md
2. Read README.md
3. Read PROJECT_ROADMAP.md
4. Read ARCHITECTURE.md
5. Verify current sprint

Never assume architecture.

Never rewrite large parts of the project without approval.

When uncertain:

Ask.

---

# Long-Term Goal

Build Laraweb Cloud Platform into a scalable SaaS platform capable of managing every Laraweb software product from one centralized dashboard.

Every implementation should move the project closer to that vision.