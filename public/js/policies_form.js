document.addEventListener('DOMContentLoaded', function () {
    const policyForm = document.getElementById('policyForm');
    const submitBtn = policyForm.querySelector('button[type="submit"]');
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    const contentTextarea = document.getElementById('content');
    const pdfFileInput = document.getElementById('pdf_file');
    let ckEditorInstance = null; // To hold the CKEditor instance

    if (titleInput && slugInput) {
        titleInput.addEventListener('input', function () {
            if (!slugInput.value.trim()) {
                slugInput.value = this.value.toLowerCase().replace(/[\s-]+/g, '-').replace(/[^\w-]+/g, '');
            }
        });
    }

    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            ckEditorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    // Basic logic to disable the CKEditor if a PDF is chosen (optional enhancement)
    if (contentTextarea && pdfFileInput && typeof ClassicEditor !== 'undefined') {
        pdfFileInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                if (ckEditorInstance) {
                    ckEditorInstance.isReadOnly = true;
                } else {
                    contentTextarea.disabled = true;
                }
                contentTextarea.required = false;
            } else {
                if (ckEditorInstance) {
                    ckEditorInstance.isReadOnly = false;
                } else {
                    contentTextarea.disabled = false;
                }
                contentTextarea.required = true;
            }
        });

        // Handle the reverse: if text is entered in CKEditor, clear the file input
        const editorElement = document.querySelector('#content');
        if (editorElement) {
            editorElement.addEventListener('input', () => {
                if (ckEditorInstance && ckEditorInstance.getData().trim()) {
                    pdfFileInput.value = '';
                } else if (!ckEditorInstance && contentTextarea.value.trim()) {
                    pdfFileInput.value = '';
                }
            });
        }
    }

    policyForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Store original button text and disable button
        const originalBtnText = submitBtn.textContent;
        submitBtn.textContent = 'Submitting...';
        submitBtn.disabled = true;

        try {
            const formData = new FormData(this);
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            // Check if response is JSON
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                const text = await response.text();
                throw new Error(`Expected JSON, got: ${text.substring(0, 100)}...`);
            }

            const data = await response.json();

            if (!response.ok) {
                // Handle validation errors with SweetAlert2
                if (typeof Swal !== 'undefined' && data.errors) {
                    let errorMessages = '';
                    Object.keys(data.errors).forEach(field => {
                        errorMessages += `<p>${field}: ${data.errors[field].join('<br>')}</p>`;
                    });
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: errorMessages,
                    });
                } else if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Policy creation failed',
                    });
                } else {
                    alert('Policy creation failed. Please check the console for errors.');
                    console.error('Policy creation failed:', data);
                }
                return;
            }

            // Handle success
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message || 'Policy created successfully.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    }
                });
            } else {
                alert(data.message || 'Policy created successfully.');
                if (data.redirect) {
                    window.location.href = data.redirect;
                }
            }

        } catch (error) {
            console.error('Error:', error);
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An error occurred: ' + error.message,
                });
            } else {
                alert('An error occurred during submission. Please check the console for errors.');
            }
        } finally {
            // Reset button state
            submitBtn.textContent = originalBtnText;
            submitBtn.disabled = false;
        }
    });
});
