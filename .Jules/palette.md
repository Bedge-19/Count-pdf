## 2026-09-18 - Keyboard Navigation for Drag-and-Drop Zones
**Learning:** Custom drag-and-drop file upload containers hiding standard `<input type="file">` elements render file selection inaccessible to keyboard users unless explicitly exposed with `tabindex="0"`, `role="button"`, and `Enter`/`Space` keydown handlers.
**Action:** When converting custom container elements into interactive file upload drop zones, always add `tabindex="0"`, `role="button"`, proper `aria-label`, key listeners for `Enter` and `Space`, and `:focus-visible` ring styles.
