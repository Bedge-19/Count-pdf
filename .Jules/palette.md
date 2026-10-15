## 2025-10-15 - ARIA Live & Focus States in File Upload Workflows
**Learning:** In asynchronous file upload and processing forms, screen reader users miss error messages and dynamic status updates unless containers have `role="alert"` and `aria-live="polite"`, and buttons toggle `aria-busy`. Keyboard users require explicit `:focus-visible` ring indicators.
**Action:** Always pair dynamic message alerts with `role="alert"` and `aria-live="polite"`, set `aria-busy` during async operations, and ensure `:focus-visible` styles are declared for custom buttons.
