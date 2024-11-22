<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration Details</title>
</head>
<body>
    <h3>Hello,</h3>
    <p>Your registration is successful. Below are your login details:</p>

    <table>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <td><strong>Password:</strong></td>
            <td>{{ $password }}</td>
        </tr>
    </table>

    <p>Thank you!</p>
</body>
</html>
