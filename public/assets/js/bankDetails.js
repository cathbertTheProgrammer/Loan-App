$(document).ready(function() {

    // Event listener for Add Product form submission
    $('#addBankDetailsForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Serialize form data
        var formData = new FormData($(this)[0]);
        
        // Send AJAX request
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(response) {
                // If update successful, display SweetAlert success notification
                Swal.fire({
                    title: "Guarantor Added Successfully",
                    toast: true,
                    icon: "success",
                    timer: 3000,
                    position: "top-right",
                    timerProgressBar: true,
                    showCancelButton: false,
                });
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // If update fails, display error message (you can customize this)
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while adding the bank details. Please try again.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
            }
        });
    });


    // Event listener for Add Product form submission
    $('#editBankDetailsForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Serialize form data
        var formData = new FormData($(this)[0]);
        
        // Send AJAX request
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(response) {
                console.log("response",response);
                if (response && response.message) {
                    // Display success message
                    Swal.fire({
                        title: response.message,
                        toast: true,
                        icon: "success",
                        timer: 3000,
                        position: "top-right",
                        timerProgressBar: true,
                        showCancelButton: false,
                    });
                    window.location.reload();
                    
                } else {
                    // If response does not contain a message, display a generic success message
                    Swal.fire({
                        title: "Bank Details Updated Successfully",
                        toast: true,
                        icon: "success",
                        timer: 3000,
                        position: "top-right",
                        timerProgressBar: true,
                        showCancelButton: false,
                    });

                    window.location.reload();
                }
            },
            
            error: function(xhr, status, error) {
                // If update fails, display error message (you can customize this)
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while updating the Bank Details. Please try again.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
            }
        });
    });
    
    
    
});



