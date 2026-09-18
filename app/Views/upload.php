<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Page Counter</title>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <main class="container">
        <div class="card">
            <!-- Header -->
            <div class="header">
                <h1>PDF Page Counter</h1>
                <p>Upload a PDF file to determine the total number of pages.</p>
            </div>

            <!-- Upload Zone -->
            <div id="upload-zone" class="upload-zone" tabindex="0" role="button" aria-label="Upload PDF file drop zone">
                <input type="file" id="pdf-upload" accept="application/pdf" hidden>
                <div class="upload-content">
                    <!-- Document Add Icon -->
                    <svg class="upload-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <h2>📄 Upload PDF File</h2>
                    <p class="supported-format">Supported format: <strong>PDF only</strong></p>
                    <p class="max-size">Maximum file size: <strong>20 MB</strong></p>
                    <button class="btn-secondary" id="choose-file-btn" type="button">Choose File</button>
                    <p class="drag-drop-text">or Drag & Drop Area</p>
                </div>
            </div>

            <!-- File Info (Hidden initially) -->
            <div id="file-info" class="file-info hidden">
                <div class="file-details">
                    <!-- PDF Icon -->
                    <svg class="file-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" />
                        <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                    </svg>
                    <div class="file-meta">
                        <span id="file-name" class="file-name">Document.pdf</span>
                        <span id="file-size" class="file-size">2.3 MB</span>
                    </div>
                </div>
                <button id="remove-file-btn" class="btn-icon" aria-label="Remove file" type="button">
                    <!-- Close Icon -->
                    <svg class="close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Error Alert (Hidden initially) -->
            <div id="alert-box" class="alert hidden" role="alert" aria-live="assertive">
                <!-- Warning Icon -->
                <svg class="alert-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
                <span id="alert-message">Only PDF files are allowed.</span>
            </div>

            <!-- Action Button -->
            <button id="count-btn" class="btn-primary" disabled type="button">
                <span id="btn-text">Count Pages</span>
                <!-- Spinner Icon -->
                <svg id="btn-spinner" class="spinner hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>

            <!-- Result Card (Hidden initially) -->
            <div id="result-card" class="result-card hidden" aria-live="polite">
                <h3>PDF Information</h3>
                <div class="result-row">
                    <span class="result-label">File Name:</span>
                    <span id="res-file-name" class="result-value">sample.pdf</span>
                </div>
                <div class="result-row">
                    <span class="result-label">Total Pages:</span>
                    <span id="res-total-pages" class="result-value">125 Pages</span>
                </div>
                <div class="result-row">
                    <span class="result-label">Status:</span>
                    <span class="result-status success">
                        <!-- Check Circle Icon -->
                        <svg class="success-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                        Successfully Read
                    </span>
                </div>
            </div>
        </div>
    </main>

    <!-- App Script -->
    <script src="/js/script.js"></script>
</body>
</html>
