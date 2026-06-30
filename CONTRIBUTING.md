# CONTRIBUTING.md

# Laraweb Cloud Platform

Contribution Guide

Version 1.0

---

# Purpose

This document defines how contributions should be made to Laraweb Cloud Platform.

All contributors, including AI assistants, must follow these guidelines.

The goal is to maintain a consistent, secure, and production-ready codebase.

---

# Who Can Contribute

Contributors may include:

- Product Owner
- Software Architect
- Backend Developers
- Frontend Developers
- QA Engineers
- DevOps Engineers
- AI Assistants (Codex, ChatGPT, Claude, etc.)

Every contributor follows the same engineering standards.

---

# Development Principles

Every contribution must improve the project.

Never add unnecessary complexity.

Prefer maintainability over clever code.

Follow existing architecture before introducing new patterns.

---

# Before Writing Code

Always:

1. Read README.md
2. Read AGENTS.md
3. Read PROJECT_ROADMAP.md
4. Read ARCHITECTURE.md
5. Verify the active sprint

Never implement features outside the current sprint.

---

# Branch Strategy

Main Branch

```
main
```

Development Branch

```
develop
```

Feature Branch

```
feature/<feature-name>
```

Bug Fix Branch

```
fix/<issue-name>
```

Documentation Branch

```
docs/<topic>
```

Never develop directly on `main`.

---

# Commit Convention

Use meaningful commit messages.

Examples

```
feat: add customer management
```

```
fix: resolve license verification bug
```

```
docs: update deployment guide
```

```
refactor: simplify activation service
```

```
test: add customer service tests
```

Avoid generic messages such as:

```
update
```

```
fix
```

```
done
```

---

# Pull Request Checklist

Before opening a Pull Request:

✓ Code compiles

✓ Migrations work

✓ Seeder works

✓ Documentation updated

✓ No debug code

✓ No commented production code

✓ No secrets committed

---

# Coding Standards

Follow:

- PSR-12
- Laravel Best Practices
- SOLID Principles

Controllers should remain thin.

Business logic belongs inside Services.

---

# Documentation

Whenever code changes:

Review whether the following documents also need updates:

- README.md
- ARCHITECTURE.md
- DATABASE.md
- API_GUIDE.md
- DEPLOYMENT.md

Documentation is part of the feature.

---

# Database Changes

Every schema change requires:

Migration

Seeder update (if needed)

Documentation update

Never modify historical production migrations.

---

# API Changes

API changes require:

Documentation

Example requests

Example responses

Version review

Never introduce breaking changes without approval.

---

# Testing

Minimum validation before merge:

```
composer install
```

```
php artisan migrate
```

```
php artisan db:seed
```

```
php artisan optimize
```

Verify:

- Login
- Dashboard
- CRUD
- API

---

# Security Checklist

Never commit:

- .env
- passwords
- tokens
- secrets

Always validate:

- Authorization
- Authentication
- Input
- Uploads

---

# Code Review

Every Pull Request should be reviewed for:

Architecture

Security

Maintainability

Performance

Documentation

Readability

---

# AI Contribution Rules

AI assistants must:

Read project documentation before writing code.

Never invent business requirements.

Never skip validation.

Never disable security features.

Never implement future sprint functionality.

If requirements are unclear, request clarification.

---

# Definition of Done

A task is complete only if:

✓ Code implemented

✓ Validation passed

✓ Documentation updated

✓ Review completed

✓ Ready for deployment

---

# Code of Conduct

Respect contributors.

Discuss ideas objectively.

Focus on improving the project.

Keep communication professional and constructive.

---

# Final Principle

Every contribution should leave the repository in a better state than before.

Small, consistent improvements are preferred over large, risky changes.
