# Laraweb Cloud Platform Agent Rules

## Product vision
Laraweb Cloud Platform is a SaaS vendor management platform for Laraweb products. It manages customers, products, licenses, activation requests, downloads, releases, billing, support, and analytics over time.

## Sprint rules
- Implement the current sprint only.
- Sprint 1 includes Laravel 11, Filament 3 admin, dashboard, customers, products, licenses, activation requests, activity logs, seeders, and documentation.
- Do not implement billing, update center, support tickets, marketplace, reseller workflows, or advanced analytics until a future sprint explicitly requests them.

## Coding standard
- Use PHP 8.3+ features where appropriate.
- Follow PSR-12 and Laravel conventions.
- Use enums for fixed statuses.
- Use service classes for business logic and keep controllers and Filament actions thin.
- Use factories and seeders for repeatable test/sample data.

## Security rules
- Never commit real production credentials or customer data.
- Hash all user passwords.
- Validate admin input through Filament forms and Laravel validation.
- Keep license generation centralized in `LicenseKeyGenerator`.
- Log important administrative actions through `ActivityLogger`.

## Current sprint instruction
Build only Sprint 1 unless the user explicitly changes the sprint scope.
