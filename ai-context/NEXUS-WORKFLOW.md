# NEXUS Workflow

## Core Workflow

SHAPE -> DESIGN -> BUILD -> QA -> FIX -> ACCEPT

Work should be completed in small, sequential batches.

Do not multitask major product changes in parallel when one wave depends on the previous one.

## Roles

### ChatGPT Pro — Senior
Responsible for:
- Architecture
- Product direction
- QA strategy
- Acceptance criteria
- Scope control
- Prompt generation
- Linear organization when available
- Final review of proposed technical direction

### Codex
Primary builder/engineer for:
- Code changes
- Implementation
- Tests
- Local repository work
- Scoped refactors when explicitly approved

Codex should read `ai-context/` before implementation work when that folder is present.

### Claude
Secondary technical agent for:
- Legacy archaeology
- Code audits
- Research
- Comparing implementations
- Reviewing unclear areas before changes

### Human
Owns:
- Business judgment
- Product judgment
- Real-world QA
- Production access
- Final approval
- Context that AI cannot infer reliably

## Tool Authorities

- GitHub = code and version authority
- Linear = work / issue / execution authority
- Figma = design authority
- MySQL + phpMyAdmin = database runtime/admin authority
- SQL schema = database structure authority
- ERD = visual explanation of database relationships
- `ai-context/` = current architecture, workflow, database rules, and current-state handoff context for AI agents

## Product Separation

Silva's Remodeling and Remodel North Texas must remain separate workstreams.

Rules:
- Do not mix their Linear issues.
- Do not mix screenshots or audits.
- Do not assume Silva behavior is a Remodel North Texas requirement.
- Do not copy Silva code into Remodel North Texas without explicit approval.
- Shared KNX infrastructure may be reused only when it remains genuinely product-neutral.

## Working Rules

- One slice at a time.
- One explicit outcome per agent run when possible.
- Read `ai-context/` before architecture-sensitive work.
- Audit before editing when entering an unfamiliar or changed area.
- Do not refactor unrelated areas.
- Do not invent current behavior without evidence.
- Separate CONFIRMED, INFERRED, and PROPOSED.
- If something does not block the current slice, send it to backlog.
- QA between meaningful waves.
- Production is not the development authority.
- Keep GitHub current before/after controlled deployment work.
- Do not make database schema changes automatically.
- Do not broaden an approved file scope without stopping and reporting why.

## Repository Start Procedure

When starting a new implementation session:

1. Read `ai-context/CURRENT-STATE.md`.
2. Read `ai-context/NEXUS-ARCHITECTURE.md`.
3. Read `ai-context/NEXUS-WORKFLOW.md`.
4. Read `ai-context/DATABASE-NOTES.md` when database work may be involved.
5. Inspect the actual repository before trusting historical documentation about file paths or implementation state.
6. Report the current state before making architecture-sensitive edits.

## Prompt Shape

Every important implementation prompt should define:

- CONTEXT
- GOAL
- SCOPE
- PRODUCT / WORKSTREAM
- FILES ALLOWED
- FILES FORBIDDEN
- EXPECTED BEHAVIOR
- ACCEPTANCE CRITERIA
- DO NOT REFACTOR
- EXPECTED OUTPUT
