## 2026-10-04 - Avoid Nested Focusable Elements in Upload Dropzones
**Learning:** When turning a custom upload dropzone container into a keyboard-accessible element with `role="button"` and `tabindex="0"`, inner buttons (like "Choose File") create nested focus stops that confuse screen readers and keyboard navigation.
**Action:** Set `tabindex="-1"` and `aria-hidden="true"` on inner decorative trigger buttons inside a custom `role="button"` container so screen readers present a clean, single interactive element.
