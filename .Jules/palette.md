## 2026-09-29 - Accessible Drag-and-Drop Dropzones
**Learning:** Custom file dropzones built with `<div>` elements are completely unreachable by keyboard navigation unless given `tabindex="0"`, `role="button"`, and keydown handlers for `Enter`/`Space`.
**Action:** Always make dropzone containers focusable and attach keyboard activation listeners alongside click handlers.
