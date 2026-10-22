# NEXUS Reference Systems

## Authoritative engineering reference

The local path:

ai-context/system-architecture-reference/localbites/

contains a static snapshot of the clean NEXUS reference repository originally sourced from:

https://github.com/webservicesdsr-lab/nexus-2026.git

Snapshot commit:

fdf1a983a5a345a1973066556a0ce68b33bf7005

The local directory retains the name `localbites` only for path compatibility.

## Purpose

This reference may be inspected for established NEXUS precedent, including:

- plugin boundaries
- authentication/session/security patterns
- REST conventions
- database access patterns
- controller/service separation
- admin module organization
- frontend/backend responsibilities
- testing conventions
- naming conventions
- implementation patterns

## Authority boundary

This reference is authoritative for NEXUS engineering precedent only.

It is not Remodel North Texas product authority or active Remodel North Texas product code.

It must not override explicit Remodel North Texas requirements, approved scope, active Linear issues, or product decisions.

## Read-only rules

- Do not modify files in this reference directory.
- Do not create runtime dependencies on this directory.
- Do not include it in active product architecture inventory.
- Do not include it in dependency analysis.
- Do not include it in production packaging.
- Do not include it in active test coverage calculations.
- Do not copy product-specific business logic blindly.
- Ignore this directory during normal active-repository analysis unless NEXUS precedent is specifically needed.

## Git behavior

The parent repository ignores:

ai-context/system-architecture-reference/

This reference is a local static snapshot and is not tracked by the Remodel North Texas repository.

Do not run pull, fetch, merge, checkout, reset, or any other Git operation inside this reference directory.
