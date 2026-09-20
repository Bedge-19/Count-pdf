## 2025-05-18 - Drag-and-Drop Upload Zone Accessibility Pattern
**Learning:** Custom drag-and-drop dropzones implemented with standard `<div>` elements are completely inaccessible to keyboard and screen reader users unless explicitly configured as interactive buttons.
**Action:** Always add `tabindex="0"`, `role="button"`, and `aria-label` to custom upload dropzones, handle `Enter` and `Space` keypress events in JavaScript to trigger file input selection, add `:focus-visible` ring styles, and mark dynamic status/error containers with `aria-live="polite"`.
