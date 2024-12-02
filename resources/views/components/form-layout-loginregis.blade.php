<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>{{ $title ?? 'Form' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            padding: 20px;
            min-height: 100vh;
            width: auto;
            display: grid; /* Removes the centering issue */
            justify-content: center; /* Centers the content */

        }       
    </style>
</head>
<body>
    <div class="container py-2">
            <h1>{{ $title ?? 'Form' }}</h1>
            {{ $slot }}
    </div>
</body>
</html>