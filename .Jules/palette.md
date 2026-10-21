## 2026-10-21 - Custom Drag-and-Drop Dropzones Keyboard Accessibility
**Learning:** In custom drag-and-drop file upload cards containing inner visual buttons, assigning `role="button"` and `tabindex="0"` to the outer dropzone requires giving inner buttons `tabindex="-1"` to prevent redundant focus stops for keyboard users.
**Action:** When making custom container dropzones focusable, ensure nested action buttons are set to `tabindex="-1"` and handle `Enter`/`Space` key events on the outer container.
