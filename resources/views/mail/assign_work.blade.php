<!DOCTYPE html>
<html>
<head>
    <title>Work Assigned</title>
</head>
<body>
    <h1>Dear {{ $subAdmin->name }},</h1>
    <p>You have been assigned new work by the Superadmin.</p>
    <p><strong>Lead Details:</strong></p>
    <ul>
        <li><strong>Name:</strong> {{ $lead->name }}</li>
        <li><strong>Phone:</strong> {{ $lead->phone }}</li>
        <li><strong>Company:</strong> {{ $lead->company_name }}</li>
    </ul>
    <p>Please log in to the system to view more details.</p>
    <p>Thank you!</p>
</body>
</html>
