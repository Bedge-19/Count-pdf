## 2025-05-18 - Accessible Drag and Drop Upload Zones
**Learning:** Custom interactive `<div>` upload zones often lack keyboard focusability and ARIA semantics, making them invisible to screen readers and keyboard users. Adding `role="button"`, `tabindex="0"`, `aria-label`, and `keydown` event listeners for `Enter`/`Space` transforms passive drag targets into fully accessible interactive elements.
**Action:** Whenever converting a non-form block element into a drop/click target, ensure it includes appropriate `role`, `tabindex`, `aria-label`, key listeners, and `:focus-visible` styling.
