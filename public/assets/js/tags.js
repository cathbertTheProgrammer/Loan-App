$(document).ready(function() {

    // Event listener for Add tag form submission
    $('#addTagForm').submit(function(event) {
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
                    title: "Tag Added Successfully",
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
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while adding the tag. Please try again.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
            }
        });
    });
    
    // Event listener for Edit tag form submission
    $('#editTagBtn').click(function(event) {
        event.preventDefault(); // Prevent default form submission
       
        // Serialize form data
        var formData = $('#editTagForm').serialize();
        var tag_id = $('#tag_id').val();

        // Send AJAX request
        $.ajax({
            url: `/admin/tag/${tag_id}/update`,
            type: 'PUT',
            data: formData,
            success: function(response) {
                // If update successful, display SweetAlert success notification
                Swal.fire({
                    title: "Tag Updated Successfully",
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
                    text: 'An error occurred while updating the tag. Please try again.',
                });
            }
        });
           
    });

     // Event listener for Delete tag form submission
     $('.delete-tag').click(function(event) {
        event.preventDefault(); // Prevent default form submission
    
        var tagId = $(this).data('tag-id');
        var url = $(this).data('tag-url');
        var name = $(this).data('tag-name');
    
        // Get CSRF token from the page's meta tags
        var token = $('meta[name="csrf-token"]').attr('content');
    
        // Send AJAX request
        Swal.fire({
            title: "Confirm",
            text: `Are you sure want to delete ${name} tag?`,
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
                    data: { id: tagId }, 
                    success: function(response) {
                        Swal.fire({
                            title: "Tag Deleted Successfully",
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
                            text: 'An error occurred while deleting the tag. Please try again.',
                        });
                    }
                });
            } else {
                Swal.fire("error", "Tag Delete Failed!!");
            }
        });
    });
    
});

// Function to populate edit modal with tag details
function populateEdittagModal(tagId, name, status) {
    $('#tag_id').val(tagId);
    $('#editTagForm').attr('action', `{{ route("tag.update", ["tag" => "${tagId}"]) }}`);
    $('#edit_name').val(name);
    $('#edit_status').val(status);
    $('#editTagModal').modal('show');
}

// Event listener for edit link clicks
$('.edit-tag').click(function() {
    var tagId = $(this).data('tag-id');
    var name = $(this).data('tag-name');
    var status = $(this).data('tag-status');
    populateEdittagModal(tagId, name, status);
});