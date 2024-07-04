$(document).ready(function() {

    // Event listener for Add brand form submission
    $('#addBrandForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Serialize form data
        var formData = $(this).serialize();
        
        // Send AJAX request
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function(response) {
                // If update successful, display SweetAlert success notification
                Swal.fire({
                    title: "Brand Added Successfully",
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
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while adding the brand. Please try again.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
            }
        });
    });
    
    // Event listener for Edit brand form submission
    $('#editBrandBtn').click(function(event) {
        event.preventDefault(); // Prevent default form submission
       
        // Serialize form data
        var formData = $('#editBrandForm').serialize();
        var brand_id = $('#brand_id').val();

        // Send AJAX request
        $.ajax({
            url: `/admin/brand/${brand_id}/update`,
            type: 'PUT',
            data: formData,
            success: function(response) {
                // If update successful, display SweetAlert success notification
                Swal.fire({
                    title: "Brand Updated Successfully",
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
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An error occurred while updating the brand. Please try again.',
                });
            }
        });
           
    });

     // Event listener for Delete Brand form submission
     $('.delete-brand').click(function(event) {
        event.preventDefault(); // Prevent default form submission
    
        var brandId = $(this).data('brand-id');
        var url = $(this).data('brand-url');
        var name = $(this).data('brand-name');
    
        // Get CSRF token from the page's meta tags
        var token = $('meta[name="csrf-token"]').attr('content');
    
        // Send AJAX request
        Swal.fire({
            title: "Confirm",
            text: `Are you sure want to delete ${name} brand?`,
            icon: "info",
            confirmButtonText: "Yes",
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                // Include CSRF token in the headers
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });
    
                // Send AJAX request with CSRF token included
                $.ajax({
                    url: url,
                    type: 'PUT', 
                    data: { id: brandId }, 
                    success: function(response) {
                        Swal.fire({
                            title: "Brand Deleted Successfully",
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
                        // If deletion fails, display error message (you can customize this)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'An error occurred while deleting the brand. Please try again.',
                        });
                    }
                });
            } else {
                Swal.fire("error", "brand Delete Failed!!");
            }
        });
    });
    
});

// Function to populate edit modal with brand details
function populateEditBrandModal(brandId, name, status) {
    $('#brand_id').val(brandId);
    $('#editBrandForm').attr('action', `{{ route("brand.update", ["brand" => "${brandId}"]) }}`);
    $('#edit_name').val(name);
    $('#edit_status').val(status);
    $('#editBrandModal').modal('show');
}

// Event listener for edit link clicks
$('.edit-brand').click(function() {
    var brandId = $(this).data('brand-id');
    var name = $(this).data('brand-name');
    var status = $(this).data('brand-status');
    populateEditBrandModal(brandId, name, status);
});