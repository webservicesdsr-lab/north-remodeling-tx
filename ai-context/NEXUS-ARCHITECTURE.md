# NEXUS Architecture

## Purpose

NEXUS is the shared software architecture used across products such as Silva's Remodeling and Remodel North Texas.

WordPress is treated as the runtime/container, not as the product admin experience.

The goal is to keep responsibilities separated so multiple products can share stable infrastructure without turning authentication, navigation, presentation, and business logic into one plugin.

## Product Boundary Rule

Silva's Remodeling and Remodel North Texas are separate products.

They may share reusable KNX infrastructure, but they do not share product behavior by default.

Do not automatically copy between products:
- roadmap
- UI decisions
- information architecture
- content
- business workflows
- service logic
- customer portal behavior
- screenshots or audit conclusions

Silva may be used as a reference for Remodel North Texas only when explicitly requested.

## Current Architecture

### KNX Auth & Core
Owns:
- Identity
- Authentication
- Sessions
- Security
- Shared REST/security infrastructure
- Shared low-level helpers required by authentication

Must not become the home for:
- Estimates
- Jobs
- Services
- Products
- Payments
- Invoices
- Calculators
- Customer dashboard business logic
- Remodel North Texas-specific business logic
- Silva-specific business logic

### KNX Shell
Owns:
- Global application chrome
- Navigation
- Branding
- Global menu behavior
- Shared shell UI
- Mobile navigation behavior

KNX Shell must remain reusable across products.

It must not contain hardcoded product-specific remodeling labels, workflows, services, or business logic.

Product-specific labels and navigation should be configuration or product-layer concerns.

### Nexus Shell Theme
Owns:
- Presentation
- Pages
- Page composition
- Consumer-facing experience
- Integration of shell + product modules at the presentation layer

The theme may render product-specific experiences, but it should not absorb reusable authentication/security responsibilities or unrelated business logic.

### Business Modules
Business-specific functionality should live outside Auth and Shell.

Examples:
- Estimates
- Jobs / Projects
- Services
- Calculators
- Invoices / Payments
- Lead capture
- Customer Portal features
- Vendor / company / hub workflows

Business modules must declare which product they belong to unless they are intentionally designed as reusable global modules.

## Shared Infrastructure vs Product Code

### Shared / Global
Examples:
- KNX Auth & Core
- KNX Shell
- shared REST/security primitives
- reusable UI infrastructure explicitly designed to be product-neutral

### Product-Specific
Examples:
- Remodel North Texas homepage
- Remodel North Texas services and lead capture
- Silva Customer Portal behavior
- Silva public website service-page implementation
- product-specific CRM workflows

A product-specific feature must not be moved into a global plugin merely because more than one page uses it.

## Architecture Rules

- WordPress is infrastructure, not the product UI authority.
- Auth & Core owns identity/session/security.
- Shell owns global navigation and app chrome.
- Theme owns presentation.
- Business logic belongs in dedicated modules.
- Product boundaries are explicit.
- Shared code must be intentionally product-neutral.
- Mobile is canonical.
- Desktop is an adaptive expansion, not a separate product.
- Avoid hover-critical UX.
- Prefer one primary action per screen when possible.
- Premium feel should come from hierarchy, spacing, typography, consistency, and motion rather than UI clutter.
- Strong architecture at the boundaries, flexible development inside the boundaries.
- Do not create automatic database migrations unless explicitly approved.
- Resolve WordPress database tables through `$wpdb->prefix`.

## Development Principle

Human-directed, AI-amplified.

Humans make product and architecture decisions. AI agents investigate, build, test, and organize work inside approved boundaries.

AI agents must distinguish:
- CONFIRMED
- INFERRED
- PROPOSED

before making architecture-sensitive changes.
