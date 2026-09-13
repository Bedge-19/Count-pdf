## 2025-05-18 - Drag & Drop Upload Zone Keyboard Accessibility
**Learning:** Custom drag-and-drop container elements acting as file triggers often lack keyboard accessibility (`tabindex="0"`, `role="button"`, keydown handlers) and focus ring styles, preventing keyboard-only users from selecting files without mouse interaction.
**Action:** Always provide explicit keyboard accessibility (`tabindex="0"`, `role="button"`, `Enter`/`Space` listeners, and `:focus-visible` ring) on drop zone containers.
