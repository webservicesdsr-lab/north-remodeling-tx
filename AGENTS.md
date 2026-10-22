# Repository Instructions

Before architecture-sensitive work, read the active context documents in
`ai-context/`, including `NEXUS-REFERENCE-SYSTEMS.md`. Apply the architecture,
workflow, database, and product-boundary rules documented there.

## Local architecture reference

- Ignore `ai-context/system-architecture-reference/` during normal active-repository
  analysis; do not recursively include its contents when reading active context.
- Consult `ai-context/system-architecture-reference/localbites/` only when relevant
  NEXUS architectural or engineering precedent is needed.
- Never edit files inside the reference directory. It is READ-ONLY material, not
  active Remodel North Texas code.
- LocalBites is precedent, not product authority. Never treat LocalBites behavior
  as a Remodel North Texas requirement unless explicitly approved.
- Do not create runtime dependencies on the reference directory or include it in
  architecture inventory, production packaging, test coverage calculations, or
  dependency analysis for the active product.
- Do not copy LocalBites-specific business logic blindly.
- Keep the reference directory excluded from Git through the root `.gitignore`.
