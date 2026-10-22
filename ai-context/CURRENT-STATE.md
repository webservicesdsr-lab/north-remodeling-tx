# NEXUS Current State

## Repository Structure

Current known high-level structure:

- global-plugins/
  - knx-global-auth/
  - knx-shell/
  - nexus-shell-theme/
- ai-context/
  - CURRENT-STATE.md
  - NEXUS-ARCHITECTURE.md
  - NEXUS-WORKFLOW.md
  - DATABASE-NOTES.md

## Current Product Separation

There are now two distinct product tracks:

### Silva's Remodeling
Silva's Remodeling is the existing product and current-state reference system.

Its software, UI patterns, customer portal, public website, service pages, and operational behavior should be documented and maintained as Silva-specific behavior.

Silva must not be treated as the default product specification for Remodel North Texas.

### Remodel North Texas
Remodel North Texas is a separate greenfield product.

It may share reusable KNX infrastructure, but its:
- roadmap
- information architecture
- UI
- content
- business modules
- workflows
- product decisions

must be defined independently.

Silva may be consulted as a reference only when explicitly requested.

## Known Current Components

### KNX Global Auth
Current repository includes:
- knx-auth-core.php
- auth modules
- admin modules
- REST/security helpers
- schema SQL
- deployment ZIP artifact

Important:
- The source folder is the code authority.
- Deployment ZIP files are artifacts, not source authority.
- Historical documentation may refer to an older bootstrap filename. Code must be inspected before declaring the current bootstrap path.

### KNX Shell
Current repository includes:
- knx-shell.php
- navbar module
- admin settings
- shared helpers

KNX Shell is global infrastructure. It must remain configurable and reusable across products and must not absorb Remodel North Texas-specific remodeling content or business logic.

### Nexus Shell Theme
Current repository includes:
- standard WordPress theme files
- Home page files
- Home CSS split into several files
- Home JS
- shared assets

The theme owns presentation and page composition. Product-specific presentation may use KNX Shell and business modules without moving product logic into the global shell.

## Completed Silva Audit

The current Silva audit wave is complete.

Completed areas include:
- Customer Portal shell/navigation
- Home
- Estimates
- Active Jobs
- Past Jobs
- Services
- Calculators
- Account
- Public website service-page family

The public service-page audit confirmed repeated service-page patterns across:
- Kitchen
- Bathroom
- Flooring
- Painting
- Basement
- Carpentry
- Mechanical
- Full House

These findings are Silva current-state documentation, not Remodel North Texas product requirements.

## Current Product Focus

Primary active product focus: Remodel North Texas.

Remodel North Texas is a greenfield build on top of reusable KNX infrastructure.

The next implementation work should begin only after a read-only repository audit confirms the actual current state of:
- KNX Global Auth
- KNX Shell
- Nexus Shell Theme
- any existing Remodel North Texas-specific code

## Immediate Engineering Objective

Before building new Remodel North Texas product screens:

1. Open the existing repository in VS Code / Codex.
2. Read this `ai-context` folder first.
3. Perform a read-only audit of the current repository.
4. Confirm the real state of KNX Shell and global infrastructure.
5. Identify where Remodel North Texas-specific code should live without contaminating global plugins.
6. Propose the smallest first implementation slice.
7. Do not edit code until scope and file boundaries are approved.

## Current Execution Strategy

Use the NEXUS workflow:

SHAPE -> DESIGN -> BUILD -> QA -> FIX -> ACCEPT

Work in small, sequential slices.

Do not rebuild the entire platform at once.
Do not refactor unrelated areas.
Do not mix Silva-specific logic into Remodel North Texas.
Do not move product-specific logic into KNX Auth or KNX Shell.

## Current Linear Separation

- Silva's Remodeling remains in its existing Linear project and issue history.
- Remodel North Texas has its own separate Linear project.
- Issues, screenshots, audits, roadmap items, and acceptance decisions must remain separated between the two products.
