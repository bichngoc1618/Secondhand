<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Reset Link</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>

    <p>We received a request to reset your password. Click the link below to reset it:</p>

    <a href="{{ route('password.reset.form',$token) }}">Reset Password</a>

    <p>If you didn't request a password reset, you can ignore this email.</p>

    <p>Thank you!</p>
</body>
</html>
