## 2025-02-18 - Drag-and-Drop Dropzone Keyboard Accessibility
**Learning:** Custom file upload dropzones hiding the native `<input type="file">` break keyboard navigation unless `tabindex="0"`, `role="region"`, keydown handlers (Enter/Space), and `:focus-visible` styles are explicitly provided on the dropzone element.
**Action:** Always complement drag-and-drop dropzones with keyboard activation support and ARIA live regions for screen reader feedback.
