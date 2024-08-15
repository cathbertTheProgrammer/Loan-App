$(document).ready(function () {

    $('#serviceRequestForm').submit(function (event) {
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
            success: function (response) {

                Swal.fire({
                    title: "Service Request sent Successfully",
                    toast: true,
                    icon: "success",
                    timer: 3000,
                    position: "top-right",
                    timerProgressBar: true,
                    showCancelButton: false,
                });
                window.location.href = '/client/service/service-request';
            },
            error: function (xhr, status, error) {

                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while sending service request. Please try again.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
            }
        });
    });




});



