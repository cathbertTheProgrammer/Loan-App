$(document).ready(function() {

    // Event listener for Add event form submission
    $('#addEventForm').submit(function(event) {
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
                    title: "Event Added Successfully",
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
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while adding the event. Please try again.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
            }
        });
    });
    
    // Event listener for Edit event form submission
    $('#editEventBtn').click(function(event) {
        event.preventDefault(); // Prevent default form submission
       
        // Serialize form data
        var formData = $('#editEventForm').serialize();
        var event_id = $('#event_id').val();

        // Send AJAX request
        $.ajax({
            url: `/admin/event/${event_id}/update`,
            type: 'PUT',
            data: formData,
            success: function(response) {
                // If update successful, display SweetAlert success notification
                Swal.fire({
                    title: "Event Updated Successfully",
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
                    text: 'An error occurred while updating the event. Please try again.',
                });
            }
        });
           
    });

     // Event listener for Delete event form submission
     $('.delete-event').click(function(event) {
        event.preventDefault(); // Prevent default form submission
    
        var eventId = $(this).data('event-id');
        var url = $(this).data('event-url');
        var title = $(this).data('event-title');
    
        // Get CSRF token from the page's meta tags
        var token = $('meta[name="csrf-token"]').attr('content');
    
        // Send AJAX request
        Swal.fire({
            title: "Confirm",
            text: `Are you sure want to delete ${title} Event?`,
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
                    data: { id: eventId }, 
                    success: function(response) {
                        Swal.fire({
                            title: "Event Deleted Successfully",
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
                            text: 'An error occurred while deleting the event. Please try again.',
                        });
                    }
                });
            } else {
                Swal.fire("error", "event Delete Failed!!");
            }
        });
    });
    
});

// Function to populate edit modal with event details
function populateEditeventModal(eventId, title, body, startDate, endDate, status) {
    $('#event_id').val(eventId);
    $('#editEventForm').attr('action', `{{ route("event.update", ["event" => "${eventId}"]) }}`);
    $('#edit_title').val(title);
    $('#edit_body').val(body);
    $('#edit_startDate').val(startDate);
    $('#edit_endDate').val(endDate);
    $('#edit_status').val(status);
    $('#editEventModal').modal('show');
}

// Event listener for edit link clicks
$('.edit-event').click(function() {
    var eventId = $(this).data('event-id');
    var title = $(this).data('event-title');
    var body = $(this).data('event-body');
    var startDate = $(this).data('event-from');
    var endDate = $(this).data('event-to');
    var status = $(this).data('event-status');
    console.log(startDate, endDate);

    populateEditeventModal(eventId, title, body, startDate, endDate, status);
});