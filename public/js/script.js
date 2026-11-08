document.addEventListener('DOMContentLoaded', () => {
    const uploadZone = document.getElementById('upload-zone');
    const fileInput = document.getElementById('pdf-upload');
    const chooseFileBtn = document.getElementById('choose-file-btn');
    
    const fileInfoBox = document.getElementById('file-info');
    const fileNameEl = document.getElementById('file-name');
    const fileSizeEl = document.getElementById('file-size');
    const removeFileBtn = document.getElementById('remove-file-btn');
    
    const alertBox = document.getElementById('alert-box');
    const alertMessage = document.getElementById('alert-message');
    
    const countBtn = document.getElementById('count-btn');
    const btnText = document.getElementById('btn-text');
    const btnSpinner = document.getElementById('btn-spinner');
    
    const resultCard = document.getElementById('result-card');
    const resFileName = document.getElementById('res-file-name');
    const resTotalPages = document.getElementById('res-total-pages');

    let currentFile = null;
    const MAX_FILE_SIZE = 20 * 1024 * 1024; // 20 MB

    // Event Listeners for Drag and Drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadZone.addEventListener(eventName, () => {
            uploadZone.classList.add('dragover');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadZone.addEventListener(eventName, () => {
            uploadZone.classList.remove('dragover');
        }, false);
    });

    uploadZone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    });

    // Event Listeners for click upload
    chooseFileBtn.addEventListener('click', () => {
        fileInput.click();
    });
    
    uploadZone.addEventListener('click', (e) => {
        if(e.target !== chooseFileBtn) {
            fileInput.click();
        }
    });

    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });

    removeFileBtn.addEventListener('click', resetState);

    countBtn.addEventListener('click', processPdf);

    function handleFiles(files) {
        if (files.length === 0) return;
        
        const file = files[0];
        
        // Reset previous states
        hideAlert();
        resultCard.classList.add('hidden');
        
        // Validation
        if (file.type !== 'application/pdf') {
            showAlert('Only PDF files are allowed.');
            resetFileState();
            return;
        }
        
        if (file.size > MAX_FILE_SIZE) {
            showAlert('File exceeds maximum size of 20 MB.');
            resetFileState();
            return;
        }

        currentFile = file;
        
        // Update UI
        fileNameEl.textContent = file.name;
        fileSizeEl.textContent = formatBytes(file.size);
        
        uploadZone.classList.add('hidden');
        fileInfoBox.classList.remove('hidden');
        countBtn.disabled = false;
    }

    function resetState() {
        resetFileState();
        hideAlert();
        resultCard.classList.add('hidden');
    }

    function resetFileState() {
        currentFile = null;
        fileInput.value = '';
        uploadZone.classList.remove('hidden');
        fileInfoBox.classList.add('hidden');
        countBtn.disabled = true;
    }

    function showAlert(msg) {
        alertMessage.textContent = msg;
        alertBox.classList.remove('hidden');
    }

    function hideAlert() {
        alertBox.classList.add('hidden');
    }

    function formatBytes(bytes, decimals = 2) {
        if (!+bytes) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`;
    }

    async function processPdf() {
        if (!currentFile) return;

        // Set Loading State
        countBtn.disabled = true;
        countBtn.setAttribute('aria-busy', 'true');
        btnText.textContent = 'Counting Pages...';
        btnSpinner.classList.remove('hidden');
        resultCard.classList.add('hidden');
        hideAlert();

        const formData = new FormData();
        formData.append('pdf_file', currentFile);

        try {
            const response = await fetch('/count-pages', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                // Show Result
                resFileName.textContent = result.filename;
                resTotalPages.textContent = `${result.pages} Page${result.pages !== 1 ? 's' : ''}`;
                
                resultCard.classList.remove('hidden');
            } else {
                showAlert(result.message || 'Unable to read PDF.');
            }
            
        } catch (error) {
            console.error('Error uploading PDF:', error);
            showAlert('Unable to read PDF.');
        } finally {
            // Reset Button State
            countBtn.disabled = false;
            countBtn.setAttribute('aria-busy', 'false');
            btnText.textContent = 'Count Pages';
            btnSpinner.classList.add('hidden');
        }
    }
});
