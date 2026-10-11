## 2026-10-11 - Drag-and-Drop Dropzone Accessible Buttons
**Learning:** Adding `role="button"` to a container element that has nested visual buttons creates duplicate focus stops and invalid nested interactive controls.
**Action:** When converting a dropzone element into a single composite button with `role="button"` and `tabindex="0"`, mark inner nested visual button elements with `tabindex="-1"` and `aria-hidden="true"`.
