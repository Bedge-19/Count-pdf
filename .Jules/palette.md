## 2026-09-14 - Avoid Nested Interactive Elements in File Upload Zones
**Learning:** Adding `role="button"` and `tabindex="0"` to a dropzone container that contains an HTML `<button>` creates invalid ARIA nesting for screen readers and keyboard users.
**Action:** Render inner decorative button triggers as non-interactive elements (e.g. `span` with `aria-hidden="true"`) or manage focus at the container level.
