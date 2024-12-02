<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Landing Page</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <x-navbar></x-navbar>
    <h1>About Page</h1>
    <p>This is the about page.</p>
    @if(Auth::check())
        @php
            $account = \App\Models\Account::where('email', Auth::user()->email)->first();
        @endphp
        <p>You are logged in as: {{ Auth::user()->email }} with role: {{ $account->Role ?? 'Role not set' }}</p>
    @else
        <p>You are not logged in.</p>
    @endif
</body>
</html>