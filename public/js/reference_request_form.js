document.getElementById('referenceRequestForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Get the submit button
    const submitBtn = this.querySelector('button[type="submit"]');

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
            // Handle validation errors with SweetAlert2 (assuming you have it included)
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
                    text: data.message || 'Submission failed',
                });
            } else {
                alert('Submission failed. Please check the console for errors.');
                console.error('Submission failed:', data);
            }
            return;
        }

        // Handle success
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: data.message || 'Reference submitted successfully.',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                if (data.redirect) {
                    window.location.href = data.redirect;
                }
            });
        } else {
            alert(data.message || 'Reference submitted successfully.');
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
