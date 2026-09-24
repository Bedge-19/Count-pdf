## 2026-09-24 - Accessible Upload Zone Keyboard Navigation
**Learning:** Making interactive drop zones focusable (`tabindex="0"`) improves accessibility, but nested interactive elements inside the drop zone (like secondary buttons) must set `tabindex="-1"` and `aria-hidden="true"` to prevent redundant tab stops and focus trap confusion.
**Action:** Always verify keyboard focus order and avoid duplicate interactive targets inside composite drop zone components.
