# Palette's Journal

## 2025-05-18 - Keyboard Focus and Accessibility for Custom Upload Dropzones
**Learning:** Custom file upload dropzones that act as clickable interactive regions require explicit `role="button"`, `tabindex="0"`, and keydown handlers for Enter/Space to ensure keyboard-only users can trigger file selection just like mouse users. Additionally, visible focus outlines using `:focus-visible` must be distinct from standard hover states to prevent losing keyboard focus.
**Action:** When working with file drop zones, always pair click handlers with Enter/Space keyboard event listeners and add explicit `:focus-visible` styles with a clear outline and offset.
