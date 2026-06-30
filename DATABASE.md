# DATABASE.md

# Laraweb Cloud Platform

Database Design

Version 1.0

---

# Purpose

This document defines the database architecture of Laraweb Cloud Platform.

The database must support:

- Multiple products
- Multiple customers
- Multiple licenses
- Future billing
- Future marketplace
- Future team management

The schema must remain scalable and backward compatible.

---

# Database Engine

Production

- MariaDB 11+

Development

- MariaDB
- MySQL 8+

Character Set

utf8mb4

Collation

utf8mb4_unicode_ci

Timezone

UTC

---

# Naming Convention

Tables

snake_case

Examples

customers

products

licenses

license_activations

activity_logs

Columns

snake_case

Foreign Keys

customer_id

product_id

license_id

UUID

uuid

---

# Primary Keys

Every table uses:

id (BIGINT)

Internal reference only.

UUID is used for:

- APIs
- Public URLs
- External references

Never expose numeric IDs through APIs.

---

# Timestamp Convention

Every table should contain:

created_at

updated_at

Soft delete whenever appropriate:

deleted_at

---

# Entity Relationship Diagram

Customer

│

├── Licenses

│

├── Activation Requests

│

└── Billing (future)

Product

│

├── Licenses

│

├── Releases

│

└── Downloads

License

│

├── Activations

├── Verification Logs

└── Activity Logs

---

# Core Tables

## users

Authentication.

Stores administrator accounts.

---

## customers

Represents organizations using Laraweb products.

Columns

- id
- uuid
- institution_name
- contact_name
- email
- phone
- domain
- address
- city
- province
- status
- notes
- timestamps

Indexes

email

domain

status

---

## products

Represents software products.

Examples

E-Arsip

Travel

POS

Columns

- id
- uuid
- name
- slug
- code
- description
- current_version
- status
- timestamps

Indexes

slug

code

status

---

## licenses

Represents purchased licenses.

Columns

- id
- uuid
- customer_id
- product_id
- license_key
- installation_id
- domain
- max_users
- starts_at
- expires_at
- last_checked_at
- status
- timestamps

Indexes

license_key

customer_id

product_id

status

expires_at

---

## activation_requests

Stores activation requests submitted by client software.

Columns

- id
- uuid
- customer_id
- product_id
- installation_id
- app_version
- domain
- server_ip
- message
- status
- reviewed_at
- timestamps

Indexes

status

domain

installation_id

---

## activity_logs

Stores important activities.

Columns

- id
- uuid
- subject_type
- subject_id
- action
- description
- metadata
- ip_address
- user_agent
- timestamps

Indexes

subject_type

subject_id

action

---

# Future Tables

Future versions may introduce:

product_versions

downloads

invoices

invoice_items

payments

subscriptions

teams

roles

permissions

notifications

audit_logs

partners

partner_customers

marketplace_products

api_tokens

email_templates

webhooks

---

# Relationship Rules

One Customer

↓

Many Licenses

One Product

↓

Many Licenses

One License

↓

Many Activations

One Customer

↓

Many Activation Requests

---

# UUID Strategy

UUID is mandatory for:

Customers

Products

Licenses

Activation Requests

Public APIs

Internal BIGINT IDs must never be exposed externally.

---

# Soft Delete Strategy

Use Soft Deletes for:

Customers

Products

Licenses

Future Billing

Future Downloads

Never permanently remove production data unless explicitly requested.

---

# Foreign Key Rules

Every relationship must use foreign keys.

Use cascade carefully.

Preferred:

Restrict deletion

instead of

Cascade deletion

Historical data must remain available.

---

# Index Strategy

Always index:

UUID

Foreign Keys

Status

License Key

Slug

Domain

Email

Avoid unnecessary indexes.

---

# Migration Rules

Never modify existing production migrations.

Always create a new migration.

Migration names must remain descriptive.

---

# Data Integrity

Validation exists in two places:

Application Layer

↓

Database Constraints

Database constraints are the final protection.

---

# Future Scaling

Database must support:

Millions of licenses

Millions of activation logs

Multiple products

Multiple tenants (future)

Partitioning may be introduced later.

---

# Backup Strategy

Daily Backup

Weekly Full Backup

Monthly Archive

Backups must be encrypted.

---

# Final Principle

The database is the foundation of Laraweb Cloud Platform.

Schema stability is more important than rapid feature development.

Breaking schema changes should be avoided whenever possible.
