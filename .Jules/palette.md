# Palette's UX Journal

## 2025-05-18 - Drag-and-Drop Dropzones Accessibility
**Learning:** Dropzones styled as interactive areas with custom click listeners often lack `tabindex`, `role="button"`, `keydown` keyboard navigation (`Enter`/`Space`), and screen reader accessible labels.
**Action:** Ensure drag-and-drop file upload containers are keyboard accessible with `tabindex="0"`, `role="button"`, keydown handlers, and `focus-visible` styling.
