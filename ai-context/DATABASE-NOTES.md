# NEXUS Database Notes

## Current Database

- Engine: MySQL
- Managed through phpMyAdmin
- Hosted with the current WordPress environment
- Schema changes are controlled manually

## Database Rules

- No automatic migrations.
- PHP should resolve tables through `$wpdb->prefix`.
- Do not hardcode installation-specific table prefixes.
- SQL is the schema authority.
- ERD is a visualization, not the source of truth.
- Database changes should be deliberate and manually reviewed.

## Schema Visibility Problem

A single `current-schema.sql` can grow beyond 2,000 lines and become impractical for humans and AI agents to consume reliably.

For that reason, the long-term plan is to keep the raw schema export but add tooling that makes the schema easier to inspect.

## Planned Schema Parser

Status: PLANNED INFRASTRUCTURE TOOLING

Purpose:
- Take a schema-only export from phpMyAdmin.
- Preserve the original SQL.
- Split table definitions into smaller files.
- Extract deterministic metadata.
- Generate a compact index for agents and humans.

The parser must:
- Never modify the database.
- Never execute schema changes.
- Never invent business relationships.
- Never convert guesses into facts.
- Distinguish explicit foreign keys from inferred application relationships.
- Preserve the raw SQL as the technical fallback.

Possible future generated structure:

database/
  raw/
    current-schema.sql
  generated/
    schema-index.md
    relationships.md
    tables/
      <table>.md

## ERD

An ERD is useful for visual understanding of:
- Tables
- Explicit relationships
- Key entities
- High-level data flow

However, application-level relationships that are not declared as foreign keys may not appear automatically.

Therefore:

SQL = exact authority
ERD = visual model
Parser = readability/access layer
