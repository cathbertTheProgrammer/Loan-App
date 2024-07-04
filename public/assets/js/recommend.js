
$('#recommendationBtn').click(function(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Set status to verified
    $('#status').val('RECOMMENDED');
    
    // Serialize form data
    var formData = $('#recommendationForm').serialize();
    var loan_id = $('#loan_id').val();

    // Send AJAX request
    $.ajax({
        url: `/admin/loans/${loan_id}/recommendation`, 
        type: 'PUT',
        data: formData,
        success: function(response) {
            // If update successful, display SweetAlert success notification
            Swal.fire({
                title: "Loan Recommended Successfully",
                toast: true,
                icon: "success",
                timer: 3000,
                position: "top-right",
                timerProgressBar: true,
                showCancelButton: false,
            });
            window.location.href = '/admin/pending/recommendation'; 
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

$('#rejectRecommendationBtn').click(function(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Set status to rejected
    $('#status').val('REJECTED');
    
    // Serialize form data
    var formData = $('#recommendationForm').serialize();
    var loan_id = $('#loan_id').val();

    // Send AJAX request
    $.ajax({
        url: `/admin/loans/${loan_id}/recommendation`,
        type: 'PUT',
        data: formData,
        success: function(response) {
            // If update successful, display SweetAlert success notification
            Swal.fire({
                title: "Loan Recommmendation Rejected Successfully",
                toast: true,
                icon: "success",
                timer: 3000,
                position: "top-right",
                timerProgressBar: true,
                showCancelButton: false,
            });
            window.location.href = '/admin/pending/recommendation'; 
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
