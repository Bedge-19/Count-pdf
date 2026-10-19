## 2025-05-10 - Keyboard Accessible Drag & Drop Dropzone
**Learning:** Custom drag-and-drop file upload containers require explicit `tabindex="0"`, `role="button"`, `aria-label`, and `keydown` handlers for `Enter` and `Space` keys to ensure full WCAG keyboard navigation compliance.
**Action:** When implementing custom upload dropzones, always include semantic button attributes and handle keyboard activation alongside click and drag events.
