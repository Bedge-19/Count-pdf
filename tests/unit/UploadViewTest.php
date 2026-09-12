<?php

use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class UploadViewTest extends CIUnitTestCase
{
    public function testUploadViewRendersAccessibilityAttributes(): void
    {
        $html = view('upload');

        $this->assertStringContainsString('role="alert"', $html);
        $this->assertStringContainsString('aria-live="assertive"', $html);
        $this->assertStringContainsString('role="status"', $html);
        $this->assertStringContainsString('aria-live="polite"', $html);
        $this->assertStringContainsString('aria-hidden="true"', $html);
    }
}
