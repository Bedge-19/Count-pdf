<?php

namespace App\Controllers;

use Smalot\PdfParser\Parser;

class PdfController extends BaseController
{
    /**
     * Display the upload view.
     */
    public function index()
    {
        return view('upload');
    }

    /**
     * Handle the AJAX PDF upload and page counting.
     */
    public function countPages()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request.'
            ]);
        }

        $validationRule = [
            'pdf_file' => [
                'label' => 'PDF File',
                'rules' => 'uploaded[pdf_file]'
                    . '|ext_in[pdf_file,pdf]'
                    . '|mime_in[pdf_file,application/pdf]'
                    . '|max_size[pdf_file,20480]', // 20 MB max
            ],
        ];

        if (!$this->validate($validationRule)) {
            $errors = $this->validator->getErrors();
            // Simplify error message if needed
            $errorMsg = empty($errors) ? 'Invalid file.' : reset($errors);
            return $this->response->setJSON([
                'success' => false,
                'message' => $errorMsg
            ]);
        }

        $file = $this->request->getFile('pdf_file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            try {
                // Read the uploaded PDF using Smalot PDF Parser
                $parser = new Parser();
                $pdf = $parser->parseFile($file->getTempName());
                
                $pages = count($pdf->getPages());

                return $this->response->setJSON([
                    'success' => true,
                    'filename' => $file->getName(),
                    'pages' => $pages
                ]);
            } catch (\Exception $e) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Unable to read PDF.'
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Empty upload or invalid file.'
        ]);
    }
}
