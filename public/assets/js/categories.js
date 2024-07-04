$(document).ready(function() {

    // Event listener for Add Category form submission
    $('#addCategoryForm').submit(function(event) {
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
                    title: "Category Added Successfully",
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
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while adding the category. Please try again.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
            }
        });
    });
    
    // Event listener for Edit Category form submission
    $('#editCategoryBtn').click(function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Serialize form data
        var formData = $('#editCategoryForm').serialize();
        var category_id = $('#category_id').val();
        

        
        // Send AJAX request
        $.ajax({
            url: `/admin/category/${category_id}/update`,
            type: 'PUT',
            data: formData,
            success: function(response) {
                // If update successful, display SweetAlert success notification
                Swal.fire({
                    title: "Category Updated Successfully",
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
                    text: 'An error occurred while updating the category. Please try again.',
                });
            }
        });
           
    });

     // Event listener for Delete Category form submission
     $('.delete-category').click(function(event) {
        event.preventDefault(); // Prevent default form submission
    
        var categoryId = $(this).data('category-id');
        var url = $(this).data('category-url');
        var name = $(this).data('category-name');
    
        // Get CSRF token from the page's meta tags
        var token = $('meta[name="csrf-token"]').attr('content');
    
        // Send AJAX request
        Swal.fire({
            title: "Confirm",
            text: `Are you sure want to delete ${name} category?`,
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
                    data: { id: categoryId }, 
                    success: function(response) {
                        Swal.fire({
                            title: "Category Deleted Successfully",
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
                            text: 'An error occurred while deleting the category. Please try again.',
                        });
                    }
                });
            } else {
                Swal.fire("error", "Category Delete Failed!!");
            }
        });
    });
    
});

// Function to populate edit modal with category details
function populateEditModal(categoryId, name, status) {
    $('#category_id').val(categoryId);
    $('#edit_name').val(name);
    $('#edit_status').val(status);
    $('#editCategoryModal').modal('show');
}

// Event listener for edit link clicks
$('.edit-category').click(function() {
    var categoryId = $(this).data('category-id');
    var name = $(this).data('category-name');
    var status = $(this).data('category-status');
    populateEditModal(categoryId, name, status);
});