<!DOCTYPE html>
<html>
<head>
    <title>Test Middleware</title>
</head>
<body>
    <h1>Middleware Test Page</h1>
    <p>If you can see this page, the middleware is working correctly for your role.</p>
    @if(isset($user))
        <p>You are logged in as: {{ $user->email }} with role: {{ $role }}</p>
    @else
        <p>You are not logged in.</p>
    @endif
</body>
</html>