$(document).ready(function() {

    // Event listener for Add Product form submission
    $(document).ready(function() {
        $('#addLoanForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            
            var formData = new FormData($(this)[0]);
            var amount = $('input[name="amount"]').val(); // Get the amount value from the form
    
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to request a loan for K' + amount + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, request it!',
                cancelButtonText: 'No, cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with AJAX request
                    $.ajax({
                        url: $('#addLoanForm').attr('action'),
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // If update successful, display SweetAlert success notification
                            Swal.fire({
                                title: "Loan Added Successfully",
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
                            var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while adding the Loan. Please try again.';
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: errorMessage,
                            });
                        }
                    });
                } else {
                    // User canceled, do nothing
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'Your loan request was cancelled.',
                        icon: 'info',
                        timer: 2000,
                        showCancelButton: false,
                        showConfirmButton: false,
                    });
                }
            });
        });
    });
    


    // Event listener for Add Product form submission
    $('#editLoanForm').submit(function(event) {
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
            
                    
                } else {
                    // If response does not contain a message, display a generic success message
                    Swal.fire({
                        title: "Loan Updated Successfully",
                        toast: true,
                        icon: "success",
                        timer: 3000,
                        position: "top-right",
                        timerProgressBar: true,
                        showCancelButton: false,
                    });
                }
            },
            
            error: function(xhr, status, error) {
                // If update fails, display error message (you can customize this)
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while updating the Loan. Please try again.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
            }
        });
    });
    
    
    
});



