
$('#verifyBtn').click(function(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Set status to verified
    $('#status').val('VERIFIED');
    
    // Serialize form data
    var formData = $('#verifyForm').serialize();
    var loan_id = $('#loan_id').val();

    // Send AJAX request
    $.ajax({
        url: `/admin/loans/${loan_id}/verification`, 
        type: 'PUT',
        data: formData,
        success: function(response) {
            // If update successful, display SweetAlert success notification
            Swal.fire({
                title: "Loan Verified Successfully",
                toast: true,
                icon: "success",
                timer: 3000,
                position: "top-right",
                timerProgressBar: true,
                showCancelButton: false,
            });
            window.location.href = '/admin/pending/verification'; 
        },
        error: function(xhr, status, error) {
            // If update fails, display error message
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'An error occurred while verifying the loan. Please try again.',
            });
        }
    });
});

$('#rejectVerifyBtn').click(function(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Set status to rejected
    $('#status').val('REJECTED');
    
    // Serialize form data
    var formData = $('#verifyForm').serialize();
    var loan_id = $('#loan_id').val();

    // Send AJAX request
    $.ajax({
        url: `/admin/loans/${loan_id}/verification`,
        type: 'PUT',
        data: formData,
        success: function(response) {
            // If update successful, display SweetAlert success notification
            Swal.fire({
                title: "Loan Rejected Successfully",
                toast: true,
                icon: "success",
                timer: 3000,
                position: "top-right",
                timerProgressBar: true,
                showCancelButton: false,
            });
            window.location.href = '/admin/pending/verification'; 
        },
        error: function(xhr, status, error) {
            // If update fails, display error message
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'An error occurred while rejecting the loan. Please try again.',
            });
        }
    });
});
