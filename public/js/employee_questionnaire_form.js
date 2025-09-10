document.getElementById('employeeQuestionnaireForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Get the submit button
    const submitBtn = this.querySelector('button[type="submit"]');

    // Store original button text and disable button
    const originalBtnText = submitBtn.textContent;
    submitBtn.textContent = 'Saving...';
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
            if (data.errors) {
                let errorMessages = '';
                Object.keys(data.errors).forEach(field => {
                    errorMessages += `<p>${field}: ${data.errors[field].join('<br>')}</p>`;
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
                    text: data.message || 'Request failed',
                });
            }
            return;
        }

        // Handle success
        if (data.redirect) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: data.message || 'Employee questionnaire saved successfully.',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = data.redirect;
            });
        } else {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: data.message || 'Employee questionnaire saved successfully.',
                showConfirmButton: false,
                timer: 1500
            });
        }

    } catch (error) {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'An error occurred: ' + error.message,
        });
    } finally {
        // Reset button state
        submitBtn.textContent = originalBtnText;
        submitBtn.disabled = false;
    }
});
