## 2026-10-25 - Interactive Drag & Drop Upload Zone Accessibility
**Learning:** File upload drag-and-drop zones often lack keyboard focusability and screen reader accessibility when implemented as `<div>` containers, rendering them inaccessible to keyboard and screen reader users.
**Action:** Always assign `tabindex="0"`, `role="button"`, and `aria-label` to interactive drag-and-drop containers, add Enter/Space keydown handlers in JavaScript to open the file input, set inner secondary button `tabindex="-1"` to avoid redundant tab stops, and define `:focus-visible` ring styles in CSS.
