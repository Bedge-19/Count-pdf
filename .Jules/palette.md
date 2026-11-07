# Palette's Journal - Critical Learnings

## 2026-11-07 - Accessible Custom Upload Zones & Live Feedback
**Learning:** Custom file upload dropzones that hide `<input type="file">` isolate keyboard and screen reader users unless the dropzone itself is given semantic button roles (`role="button"`, `tabindex="0"`, descriptive `aria-label`), keyboard listeners (`Enter`/`Space`), and `:focus-visible` styling. Furthermore, dynamic error notices must carry `role="alert"` and `aria-live="polite"` so state changes are communicated immediately without visual focus shifts.
**Action:** When implementing custom drag-and-drop or card-like interactive surfaces, always ensure the container is fully keyboard-accessible and pairs with live region announcements for asynchronous or dynamic validation results.
