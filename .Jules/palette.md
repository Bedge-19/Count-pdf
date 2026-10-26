## 2025-05-18 - Drag-and-Drop Dropzone Keyboard Accessibility
**Learning:** Custom drag-and-drop file upload zones created with `<div>` elements are completely non-interactive for screen reader and keyboard-only users unless explicitly configured with interactive attributes (`tabindex="0"`, `role="button"`) and keyboard event listeners (`keydown` for `Enter`/`Space`).
**Action:** Always complement drag-and-drop dropzones with focusable accessibility traits, `:focus-visible` ring indicators, and keyboard trigger listeners.
