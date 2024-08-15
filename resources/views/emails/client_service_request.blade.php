<!-- resources/views/emails/client_service_request.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Your Service Request Has Been Submitted</title>
</head>
<body>
    <h1>Your Service Request Has Been Submitted</h1>
    <p>Dear {{ $serviceRequest->firstname }},</p>
    <p>Your request for the following services has been submitted:</p>
    <ul>
        @foreach ($serviceRequest->services as $service)
            <li>{{ $service->service }}</li>
        @endforeach
    </ul>
    <p>We will get back to you soon with further details.</p>
    <p>Thank you,</p>
    <p>KAMULLL GROUP OF COMPANIES</p>
</body>
</html>
