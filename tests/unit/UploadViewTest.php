<?php

use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class UploadViewTest extends CIUnitTestCase
{
    public function testUploadViewHasAccessibilityAttributes(): void
    {
        $viewContent = file_get_contents(APPPATH . 'Views/upload.php');

        $this->assertStringContainsString('role="alert"', $viewContent);
        $this->assertStringContainsString('aria-live="assertive"', $viewContent);
        $this->assertStringContainsString('aria-live="polite"', $viewContent);
        $this->assertStringContainsString('aria-hidden="true"', $viewContent);
    }
}
