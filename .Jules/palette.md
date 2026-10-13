## 2026-10-13 - Non-Nesting Interactive Controls in ARIA Button Dropzones

**Learning:** When assigning `role="button"` to a container (e.g. a dropzone or card target), inner call-to-action elements like "Choose File" must use non-interactive semantic tags (`<span>`) styled like buttons rather than native `<button>` tags. Native buttons nested inside a `role="button"` container violate ARIA standards and create accessibility issues for screen readers.
**Action:** Use `<span class="...">` for inner button-styled accents when parent container is given `role="button"`.
