<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Alert</title>
</head>
<body style="font-family: sans-serif; line-height: 1.6; color: #333;">
    <h2 style="color: #d9534f;">⚠️ Admin Login Alert</h2>
    <p>Hello,</p>
    <p>This is an automated security notification for the <strong>Cagayan de Oro City Library</strong> system.</p>
    <hr>
    <ul>
        <li><strong>Admin:</strong> {{ $user->first_name }} {{ $user->last_name }}</li>
        <li><strong>Username:</strong> {{ $user->username }}</li>
        <li><strong>Time:</strong> {{ $time }}</li>
        <li><strong>IP Address:</strong> {{ $ip }}</li>
    </ul>
    <hr>
    <p>If this login was not performed by an authorized administrator, please secure the account immediately.</p>
</body>
</html>
