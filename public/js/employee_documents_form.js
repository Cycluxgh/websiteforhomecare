document.getElementById('employeeDocumentsForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const submitBtn = this.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.textContent;
    submitBtn.textContent = 'Uploading...';
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

        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            const text = await response.text();
            throw new Error(`Expected JSON, got: ${text.substring(0, 100)}...`);
        }

        const data = await response.json();

        if (!response.ok) {
            if (data.errors) {
                let errorMessages = '';
                Object.keys(data.errors).forEach(field => {
                    errorMessages += `<p><strong>${field}:</strong> ${data.errors[field].join('<br>')}</p>`;
                });
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: errorMessages,
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message || 'Upload failed',
                });
            }
            return;
        }

        Swal.fire({
            icon: 'success',
            title: 'Uploaded!',
            text: data.message || 'Documents uploaded successfully.',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            if (data.redirect) {
                window.location.href = data.redirect;
            }
        });

    } catch (error) {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'An error occurred: ' + error.message,
        });
    } finally {
        submitBtn.textContent = originalBtnText;
        submitBtn.disabled = false;
    }
});

