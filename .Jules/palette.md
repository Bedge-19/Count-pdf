## 2026-09-21 - Drag & Drop Upload Zone Keyboard & Screen Reader Accessibility
**Learning:** Custom drop zones created with `<div>` elements are inaccessible to keyboard and screen reader users unless explicitly given `tabindex="0"`, `role="button"`, `aria-label`, and keyboard event handlers (`Enter` / `Space`).
**Action:** When working with file upload drop zones, always ensure semantic ARIA attributes, keydown listener for keyboard activation, `:focus-visible` ring, and `aria-live` attributes on dynamic alert/result regions are added.
