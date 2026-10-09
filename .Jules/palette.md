# Palette's Journal - Critical Learnings

## 2026-10-09 - Accessible Dropzone Keyboard Interaction
**Learning:** Custom dropzone containers without interactive semantics (`role="button"`, `tabindex="0"`) and `keydown` event listeners for `Enter` and `Space` are inaccessible to keyboard-only and screen-reader users.
**Action:** Always add interactive ARIA roles, tab index, explicit `:focus-visible` styling, and keyboard activation handlers when building custom drag-and-drop file upload zones.
