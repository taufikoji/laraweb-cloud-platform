# ARCHITECTURE.md

# Laraweb Cloud Platform

System Architecture

Version 1.0

---

# Purpose

This document defines the long-term architecture of Laraweb Cloud Platform.

The objective is to keep the system scalable, maintainable, and independent from implementation details.

Business rules should remain stable even when frameworks or technologies change.

---

# High-Level Vision

Laraweb Cloud Platform is the central platform responsible for managing every Laraweb software product.

Applications such as:

- E-Arsip
- Travel Management
- Raport Digital
- Inventory
- POS
- Future Products

must communicate with this platform instead of implementing their own licensing infrastructure.

---

# Context Diagram

                    Customer

                        │

                        ▼

               Laraweb Product

                        │

        License API / Update API

                        │

                        ▼

           Laraweb Cloud Platform

                        │

 ┌────────────┬─────────────┬────────────┐

 ▼            ▼             ▼

Database   Storage      Notification

---

# Core Modules

Current Modules

- Authentication
- Dashboard
- Customers
- Products
- Licenses
- Activation Requests
- Activity Logs

Future Modules

- Billing
- Downloads
- Release Center
- Marketplace
- Notifications
- Analytics
- Partner Portal
- Team Management

---

# Layered Architecture

Presentation Layer

↓

Application Layer

↓

Domain Layer

↓

Infrastructure Layer

Each layer has one responsibility.

---

# Presentation Layer

Responsible for:

- Filament
- REST API
- Authentication
- Validation

Contains:

Controllers

Filament Resources

API Resources

No business logic.

---

# Application Layer

Responsible for:

Use Cases

Services

Actions

Transactions

Contains:

Services

Actions

DTO

No persistence logic.

---

# Domain Layer

Contains:

Entities

Enums

Policies

Business Rules

Domain Events

This layer represents the business itself.

---

# Infrastructure Layer

Responsible for:

Database

Filesystem

Mail

Queue

Cache

Storage

Third-party integrations

---

# Request Flow

Browser

↓

Filament Resource

↓

Controller

↓

Service

↓

Repository (future if needed)

↓

Model

↓

Database

Business logic must never skip the Service layer.

---

# Service Layer

Examples:

CustomerService

ProductService

LicenseService

ActivationService

UpdateService

BillingService

NotificationService

AnalyticsService

Services contain business rules.

---

# Folder Structure

app/

Actions/

DTOs/

Enums/

Events/

Exceptions/

Http/

Models/

Observers/

Policies/

Providers/

Services/

Support/

docs/

tests/

Never create folders without a clear architectural reason.

---

# Module Dependencies

Customer

↓

License

↓

Product

↓

Activation

↓

Update

↓

Billing

Dependencies should remain one-directional.

Avoid circular dependencies.

---

# Domain Model

Customer

↓

Product

↓

License

↓

Activation Request

↓

Release

↓

Invoice

↓

Notification

Future entities should integrate into this model.

---

# Event Architecture

Examples:

CustomerCreated

↓

Generate Default Settings

LicenseActivated

↓

Write Activity Log

↓

Send Notification

InvoicePaid

↓

Extend License

↓

Notify Customer

Business processes should use Events whenever appropriate.

---

# API Architecture

External Products

↓

REST API

↓

Application Services

↓

Database

The API should never access models directly.

---

# Authentication

Current:

Filament Authentication

Future:

OAuth

API Tokens

Personal Access Tokens

SSO

---

# Authorization

Every sensitive action must use:

Policies

Future:

Role Based Access Control

Permission Matrix

---

# Logging

Everything important must be logged.

Examples:

Login

Logout

Activation

License Revocation

API Errors

Billing Events

Never log secrets.

---

# Caching Strategy

Future caching:

Dashboard Statistics

License Verification

Product Versions

Analytics

Redis is recommended.

---

# Queue Strategy

Queue:

Emails

Notifications

License Expiration

Analytics

Report Generation

Never block HTTP requests with long-running jobs.

---

# Storage

Store:

Release Files

Documents

Product Downloads

Backups

Never store generated files inside public/.

---

# Deployment Architecture

GitHub

↓

CI/CD (future)

↓

Ubuntu

↓

Apache

↓

PHP-FPM

↓

Laravel

↓

MariaDB

Production deployments should be repeatable.

---

# Scalability

Future improvements:

Redis

Multiple Queue Workers

Object Storage

CDN

Horizontal Scaling

Load Balancer

Plugin System

Architecture decisions today must support future scaling.

---

# Error Handling

Always:

Log exceptions

Return user-friendly responses

Avoid exposing stack traces

Never ignore exceptions.

---

# Design Principles

Single Responsibility Principle

Open/Closed Principle

Dependency Injection

Composition over Inheritance

Convention over Configuration

Explicit is better than implicit.

---

# Future SDK

Official SDKs:

Laravel

CodeIgniter

WordPress

.NET

NodeJS

All SDKs communicate only through REST APIs.

---

# Final Principle

Applications should depend on Laraweb Cloud Platform.

Laraweb Cloud Platform should not depend on individual applications.

This keeps the ecosystem modular, reusable, and scalable.
