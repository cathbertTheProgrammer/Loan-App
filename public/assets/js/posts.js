$(document).ready(function() {

    // Event listener for Add post form submission
    $('#addPostForm').submit(function(event) {
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
                    title: "Post Added Successfully",
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
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while adding the post. Please try again.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
            }
        });
    });
    
    // Event listener for Edit post form submission
    $('#editPostForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
       
       
        // Serialize form data
        // var formData = new FormData($('#editPostForm')[0]);
        var formData = new FormData($(this)[0]);
        var post_id = $('#post_id').val();

        // Send AJAX request
        $.ajax({
            url: `/admin/post/${post_id}/update`,
            type: 'PUT',
            data: formData,
            processData: false, 
            contentType: false, 
            success: function(response) {
                // If update successful, display SweetAlert success notification
                Swal.fire({
                    title: "Post Updated Successfully",
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
                    text: 'An error occurred while updating the post. Please try again.',
                });
            }
        });
           
    });

     // Event listener for Delete post form submission
     $('.delete-post').click(function(event) {
        event.preventDefault(); // Prevent default form submission
    
        var postId = $(this).data('post-id');
        var url = $(this).data('post-url');
        var title = $(this).data('post-title');
    
        // Get CSRF token from the page's meta tags
        var token = $('meta[name="csrf-token"]').attr('content');
    
        // Send AJAX request
        Swal.fire({
            title: "Confirm",
            text: `Are you sure want to delete ${title} post?`,
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
                    data: { id: postId }, 
                    success: function(response) {
                        Swal.fire({
                            title: "Post Deleted Successfully",
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
                            text: 'An error occurred while deleting the post. Please try again.',
                        });
                    }
                });
            } else {
                Swal.fire("error", "Post Delete Failed!!");
            }
        });
    });
    
});

// Function to populate edit modal with post details
function populateEditpostModal(postId, title,  body, tags, image, status) {
    $('#post_id').val(postId);
    $('#editPostForm').attr('action', `{{ route("post.update", ["post" => "${postId}"]) }}`);
    $('#edit_title').val(title);
    $('#edit_body').val(body);
    $('#edit_tag_id').val(tags);
    $('#edit_image_preview').attr('src', image);
    $('#edit_status').val(status);
    $('#editPostModal').modal('show');
}

// Event listener for edit link clicks
$('.edit-post').click(function() {
    var postId = $(this).data('post-id');
    var title = $(this).data('post-title');
    var body = $(this).data('post-body');
    var tags = $(this).data('post-tags');
    var image = $(this).data('post-image');
    var status = $(this).data('post-status');
    populateEditpostModal(postId, title, body, tags , image, status);
});