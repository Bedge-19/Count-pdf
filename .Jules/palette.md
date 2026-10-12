## 2026-10-12 - Drag and Drop Zone Keyboard Accessibility Pattern
**Learning:** Custom `<div>` drop zones require `tabindex="0"`, `role="button"`, `aria-label`, explicit `keydown` event listeners for `Enter` and `Space`, and `:focus-visible` CSS rules to be accessible to keyboard users and screen readers.
**Action:** When creating or modifying drag-and-drop file upload containers, ensure keyboard interaction handlers and `:focus-visible` outline styles are included alongside `click` handlers.
