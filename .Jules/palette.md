## 2026-09-30 - Interactive Drop Zones and Nested Focusable Controls
**Learning:** Making an entire upload drop zone focusable (`role="button"`, `tabindex="0"`) while containing a secondary "Choose File" button causes nested interactive controls, leading to redundant focus stops and invalid ARIA semantics.
**Action:** When making a parent drop zone container keyboard-focusable, set child buttons to `tabindex="-1"` and `aria-hidden="true"` so the drop zone acts as a unified single interactive control.
