# READ ME BEFORE MAKING ANY CHANGE

## Purpose

This repository contains the active development code for **Remodel North Texas** and shared NEXUS infrastructure used by the project.

Before modifying code, agents and developers must understand the current NEXUS working model, product boundaries, and source authority.

This document is the primary operational entry point for work in this repository.

---

## 1. Current Code Authority

The **local working tree opened in VS Code is the active development code authority**.

Important:

- Uncommitted does **not** mean outdated.
- Modified or untracked local files may represent valid current development work.
- Do not assume GitHub contains the newest implementation.
- Do not replace local code with remote code unless explicitly instructed.
- Do not use Git history to decide which implementation is authoritative unless the task explicitly requires it.

### GitHub

GitHub is used for:

- version history
- backup
- collaboration
- controlled commits

GitHub may lag behind the current local working state during active development.

### WordPress Runtime

WordPress and File Manager represent the deployed runtime environment.

They are used for:

- deployment
- runtime validation
- production/staging verification

They are not automatically the development source authority.

When working locally, treat the approved local working tree as the implementation state unless the human explicitly says otherwise.

---

## 2. Product Separation

**Silva's Remodeling** and **Remodel North Texas** are separate products.

They may share intentionally reusable NEXUS infrastructure, but they do not share product behavior by default.

Do not automatically copy between products:

- UI decisions
- roadmap
- navigation
- content
- business workflows
- customer portal behavior
- service logic
- screenshots
- audit conclusions
- product-specific code

Silva may only be used as a reference when explicitly requested.

---

## 3. NEXUS Architecture Boundaries

WordPress is the runtime/container.

Business responsibilities must remain separated.

### KNX Auth & Core

Owns:

- identity
- authentication
- sessions
- security
- shared authentication helpers
- shared REST/security infrastructure

Must not become the home for product business logic.

### KNX Shell

Owns:

- global application chrome
- navigation
- branding
- shared menu behavior
- mobile navigation
- reusable shell UI

KNX Shell must remain product-neutral.

Do not hardcode Remodel North Texas business behavior into KNX Shell.

### Theme / Presentation Layer

Owns:

- page presentation
- page composition
- consumer-facing rendering
- integration of Shell and product modules

Presentation must not become the authority for authentication, security, or unrelated business logic.

### Business Modules

Product-specific functionality belongs outside Auth and Shell.

Examples:

- leads
- estimates
- jobs
- services
- invoices
- payments
- calculators
- customer portal workflows
- vendor/company workflows

---

## 4. Development Workflow

Use:

**SHAPE -> DESIGN -> BUILD -> QA -> FIX -> ACCEPT**

Work in small, sequential slices.

Do not rebuild or refactor large areas when the task only requires a bounded change.

For meaningful implementation work, define:

- CONTEXT
- PRODUCT / WORKSTREAM
- GOAL
- SCOPE
- FILES ALLOWED
- FILES FORBIDDEN
- EXPECTED BEHAVIOR
- ACCEPTANCE CRITERIA
- QA PLAN
- DO NOT REFACTOR
- EXPECTED OUTPUT

---

## 5. Codex Role

Codex is the implementation engineer.

Codex may:

- inspect active code
- implement approved changes
- run tests
- validate scoped behavior
- report conflicts

Codex does **not** control:

- product direction
- architecture
- ownership boundaries
- scope expansion
- global abstractions

Those decisions belong to the Senior architect and human owner.

If existing code conflicts with an approved task boundary, Codex should report the conflict rather than independently redesigning the system.

---

## 6. System Architecture Reference

The directory:

`ai-context/system-architecture-reference/`

contains historical/static NEXUS reference material.

It is **not part of the normal Codex working context**.

Do not:

- inspect it automatically
- search it automatically
- index it automatically
- reason from it automatically
- modify it
- treat it as active product code

The Senior architect decides when a specific NEXUS precedent should be consulted.

When reference material is explicitly requested, treat it as engineering precedent only.

Reference precedent never overrides explicit Remodel North Texas requirements.

---

## 7. Database Rules

Database changes are deliberate and manually reviewed.

Rules:

- No automatic migrations unless explicitly approved.
- Use `$wpdb->prefix`.
- Never hardcode installation-specific WordPress table prefixes.
- SQL is the schema authority.
- ERD is explanatory, not authoritative.
- Never invent database relationships.
- Do not modify schema merely because code would be easier with a new field/table.

---

## 8. Implementation Principles

- Audit before editing unfamiliar code.
- Make the smallest valid change.
- Do not refactor unrelated areas.
- Preserve working behavior unless a change is intentional.
- Prefer explicit responsibilities over clever abstractions.
- Security authority belongs server-side.
- Do not trust client data when authoritative context can be loaded server-side.
- UI must not become the authority for business state.
- Avoid hidden coupling between plugins.
- Shared does not automatically mean global.
- Repeated code does not automatically belong in KNX Core.
- Global code must be intentionally product-neutral.
- Mobile is canonical.
- Desktop is an adaptive expansion.
- Validate after meaningful implementation waves.

---

## 9. Code Practices

- Code comments should be written in English.
- UI should not use emojis as interface icons.
- Use proper icon systems where needed.
- Do not hardcode product-specific labels into reusable global modules.
- Do not rely on `wp_footer` for KNX Shell behavior where existing NEXUS rules prohibit it.
- Prefer established module boundaries over introducing new global dependencies.

---

## 10. Before Every Architecture-Sensitive Change

Read:

1. `READ-ME-BEFORE-MAKING-ANY-CHANGE.md`
2. `AGENTS.md`
3. `ai-context/CURRENT-STATE.md`
4. `ai-context/NEXUS-ARCHITECTURE.md`
5. `ai-context/NEXUS-WORKFLOW.md`
6. `ai-context/DATABASE-NOTES.md` when database work is relevant

Then inspect the actual local implementation before making assumptions.

---

## 11. Evidence Discipline

Separate findings into:

### CONFIRMED
Directly verified from current code or runtime evidence.

### INFERRED
Strongly suggested but not directly proven.

### PROPOSED
Recommended future action.

Never convert an inference into a fact without evidence.

---

## 12. Final Rule

The goal is not to make the code merely work.

The goal is to make each approved change fit the NEXUS system without contaminating:

- global infrastructure
- product boundaries
- source authority
- security authority
- future maintainability

When uncertain about architecture or scope:

**report first, do not improvise.**