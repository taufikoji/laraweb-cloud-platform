# API_GUIDE.md

# Laraweb Cloud Platform

REST API Documentation

Version 1.0

---

# Purpose

This document defines the official REST API standard used by Laraweb Cloud Platform.

All Laraweb software products must communicate with this API.

Examples:

- E-Arsip
- Travel Management
- Raport Digital
- Inventory
- POS
- Future Laraweb products

The API is the only supported communication channel.

Applications should never access the database directly.

---

# Base URL

Production

https://panel.laraweb.cloud/api/v1

Development

http://localhost:8000/api/v1

---

# API Principles

RESTful

JSON Only

Stateless

Versioned

HTTPS Only

---

# Authentication

Current

Laravel Sanctum

Future

OAuth2

Personal Access Token

API Key

Partner Token

---

# Request Headers

Required

Accept: application/json

Content-Type: application/json

Authorization: Bearer {token}

---

# Standard Response

Success

```json
{
  "success": true,
  "message": "Operation completed successfully.",
  "data": {},
  "errors": [],
  "timestamp": "2026-07-01T08:30:00Z"
}
```

Failure

```json
{
  "success": false,
  "message": "Validation failed.",
  "data": null,
  "errors": [
    {
      "field": "email",
      "message": "Email is required."
    }
  ],
  "timestamp": "2026-07-01T08:30:00Z"
}
```

---

# HTTP Status Codes

200 OK

201 Created

204 No Content

400 Bad Request

401 Unauthorized

403 Forbidden

404 Not Found

409 Conflict

422 Validation Error

429 Too Many Requests

500 Internal Server Error

---

# Versioning

Every endpoint must include a version.

Example

/api/v1/licenses

Future

/api/v2/licenses

Never introduce breaking changes without a new API version.

---

# Pagination

Standard

```json
{
    "data": [],
    "links": {},
    "meta": {}
}
```

Laravel Resource Collections should be used.

---

# License Endpoints

## Verify License

POST

/api/v1/licenses/verify

Request

```json
{
    "license_key": "",
    "installation_id": "",
    "domain": "",
    "app_version": ""
}
```

Response

```json
{
    "success": true,
    "message": "License verified.",
    "data": {
        "status": "active",
        "expires_at": "2027-07-01"
    }
}
```

---

## Activate License

POST

/api/v1/licenses/activate

Purpose

Register a new installation.

---

## Deactivate License

POST

/api/v1/licenses/deactivate

Purpose

Deactivate an existing installation.

---

## Extend License

POST

/api/v1/licenses/extend

Admin only.

---

## Revoke License

POST

/api/v1/licenses/revoke

Admin only.

---

# Product Endpoints

GET

/api/v1/products

GET

/api/v1/products/{uuid}

GET

/api/v1/products/{uuid}/latest-version

---

# Customer Endpoints

GET

/api/v1/customers

POST

/api/v1/customers

PUT

/api/v1/customers/{uuid}

DELETE

/api/v1/customers/{uuid}

Admin only.

---

# Activation Requests

POST

/api/v1/activation-requests

Client software submits activation requests.

Admin reviews through Filament.

---

# Update Center

GET

/api/v1/products/{uuid}/updates

Returns

Latest Version

Release Notes

Download URL

Checksum

---

# Downloads

GET

/api/v1/downloads/{uuid}

Requires valid license.

---

# Billing (Future)

Invoices

Subscriptions

Payments

Renewals

---

# Notifications (Future)

GET

/api/v1/notifications

POST

/api/v1/notifications/read

---

# Analytics (Future)

Dashboard Statistics

Revenue

License Count

Customer Growth

---

# Rate Limiting

Public API

60 requests/minute

Authenticated API

120 requests/minute

Verification API

Configurable

---

# Security

Always use HTTPS.

Never expose internal IDs.

Never expose stack traces.

Never expose SQL errors.

Validate every request.

---

# Validation

All input must be validated.

Return HTTP 422 for validation failures.

---

# Idempotency

Activation endpoints should support idempotent requests where applicable to avoid duplicate records when the same request is retried.

---

# Error Handling

Every error must contain:

success

message

errors

timestamp

Never return HTML.

Never return framework exceptions.

---

# API Documentation

Every endpoint must include:

Purpose

Request Example

Response Example

Authentication

Validation Rules

Possible Errors

---

# Future SDKs

Official SDKs will be provided for:

Laravel

CodeIgniter

WordPress

.NET

Node.js

The SDKs should hide HTTP implementation details and expose a clean developer API.

---

# Final Principle

The API is a long-term contract.

Changing the API is more expensive than adding new features.

Design carefully.
