# Palette's Journal - Critical UX Learnings

## 2025-05-18 - Drag-and-drop Upload Zone Keyboard & Screen Reader Accessibility
**Learning:** File upload drag-and-drop containers acting as interactive dropzones are often inaccessible to keyboard users without `tabindex="0"`, `role="button"`, and Enter/Space key handling, while dynamic result/alert boxes require `aria-live="polite"` or `role="status"`/`alert` for screen readers.
**Action:** Always make dropzones keyboard-focusable with button semantics and key event handlers, and add `aria-live="polite"` to dynamically toggled feedback components.
