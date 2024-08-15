$(document).ready(function() {

 


     // Event listener for Delete Brand form submission
     $('.mark-complete').click(function(event) {
        event.preventDefault(); // Prevent default form submission
    
        var requestId = $('#request_id').val();
      
        // Get CSRF token from the page's meta tags
        var token = $('meta[name="csrf-token"]').attr('content');
    
        // Send AJAX request
        Swal.fire({
            title: "Confirm",
            text: `Are you sure want to mark this service request as complete?`,
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
                    url: `/admin/serviceRequests/${requestId}/completed`,
                    type: 'PUT', 
                    data: { 
                        id: requestId,
                     }, 
                    success: function(response) {
                        Swal.fire({
                            title: "Marked as Completed Successfully",
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
                            text: 'An error occurred while marking this service request as completed. Please try again.',
                        });
                    }
                });
            } else {
                Swal.fire("error", "Marking service request completed Failed!!");
            }
        });
    });
    
});

// Function to populate edit modal with brand details
function populateViewRequestModal(
    requestId,
    requestType,
    requestServices,
    requestEmail,
    requestDescription,
    requestFirstname,
    requestLastname,
    requestUrgent,
    requestDeadLine,
    requestAddress,
    requestPhone
) {
  
    $('#request_id').val(requestId);
    document.getElementById("display-request-type").innerText = requestType.service_type;

    // Clear previous requests
    const requestsList = document.getElementById("display-requests");
    requestsList.innerHTML = ''; // Clear previous list items

    // Handle requestrequests based on its type
    if (Array.isArray(requestServices)) {
        // If it's an array, iterate over the array
        requestServices.forEach(request => {
            const li = document.createElement("li");
            li.textContent = request.service;
            requestsList.appendChild(li);
        });
    } else if (typeof requestServices === 'string') {
        // If it's a string, split by commas and iterate
        requestServices.split(',').forEach(request => {
            const li = document.createElement("li");
            li.textContent = request.service;
            requestsList.appendChild(li);
        });
    } else {
        // Handle other types if necessary
        console.error("Unexpected type for requestrequests:", typeof requestrequests);
    }

    document.getElementById("display-email").innerText = requestEmail;
    document.getElementById("display-description").innerText = requestDescription;
    document.getElementById("display-first-name").innerText = requestFirstname;
    document.getElementById("display-last-name").innerText = requestLastname;
    document.getElementById("display-phone").innerText = requestPhone;
    document.getElementById("display-address").innerText = requestAddress;
    document.getElementById("display-urgent").innerText = requestUrgent ? "Yes" : "No";
    document.getElementById("display-deadline").innerText = requestDeadLine;

    // Show the modal
    $('#viewRequestModal').modal('show');
}

// Event listener for viewing request details
$('.view-request').click(function() {
    var requestId = $(this).data('request-id');
    var requestType = $(this).data('request-type');
    var requestServices = $(this).data('request-services');
    var requestEmail = $(this).data('request-email');
    var requestDescription = $(this).data('request-description');
    var requestFirstname = $(this).data('request-firstname');
    var requestLastname = $(this).data('request-lastname');
    var requestUrgent = $(this).data('request-urgent');
    var requestDeadLine = $(this).data('request-deadline');
    var requestAddress = $(this).data('request-address');
    var requestPhone = $(this).data('request-phone');


    console.log('request type',requestType);
    console.log('request service',requestServices);
    populateViewRequestModal(
        requestId,
        requestType,
        requestServices,
        requestEmail,
        requestDescription,
        requestFirstname,
        requestLastname,
        requestUrgent,
        requestDeadLine,
        requestAddress,
        requestPhone
    );
});

