<!-- resources/views/emails/info_service_request.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>New Service Request Submitted</title>
</head>
<body>
    <h1>New Service Request Submitted</h1>
    <p>Client Details:</p>
    <ul>
        <li>First Name: {{ $serviceRequest->firstname }}</li>
        <li>Last Name: {{ $serviceRequest->lastname }}</li>
        <li>Email: {{ $serviceRequest->email }}</li>
        <li>Phone: {{ $serviceRequest->phone }}</li>
        <li>Address: {{ $serviceRequest->address }}</li>
    </ul>
    <p>Service Details:</p>
    <ul>
        <li>Service Type: {{ $serviceRequest->serviceType->service_type }}</li>
        <li>Services:
            <ul>
                @foreach ($serviceRequest->services as $service)
                    <li>{{ $service->service }}</li>
                @endforeach
            </ul>
        </li>
        <li>Description: {{ $serviceRequest->description }}</li>
        <li>Urgent: {{ $serviceRequest->urgent ? 'Yes' : 'No' }}</li>
        <li>Deadline: {{ $serviceRequest->deadline }}</li>
    </ul>
</body>
</html>
