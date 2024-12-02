<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>{{ $title }}</x-header>

    <div class="container">
        {{ $slot }}
        <button class="Btn-Container" onclick="navigate_to_reservation()">
            <span class="text">Cari Dokter!</span>
            <span class="icon-Container">
                <svg
                width="16"
                height="19"
                viewBox="0 0 16 19"
                fill="nones"
                xmlns="http://www.w3.org/2000/svg"
                >
                <circle cx="1.61321" cy="1.61321" r="1.5" fill="black"></circle>
                <circle cx="5.73583" cy="1.61321" r="1.5" fill="black"></circle>
                <circle cx="5.73583" cy="5.5566" r="1.5" fill="black"></circle>
                <circle cx="9.85851" cy="5.5566" r="1.5" fill="black"></circle>
                <circle cx="9.85851" cy="9.5" r="1.5" fill="black"></circle>
                <circle cx="13.9811" cy="9.5" r="1.5" fill="black"></circle>
                <circle cx="5.73583" cy="13.4434" r="1.5" fill="black"></circle>
                <circle cx="9.85851" cy="13.4434" r="1.5" fill="black"></circle>
                <circle cx="1.61321" cy="17.3868" r="1.5" fill="black"></circle>
                <circle cx="5.73583" cy="17.3868" r="1.5" fill="black"></circle>
                </svg>
            </span>
        </button>
    </div>

    <x-footer></x-footer>

    <script src="js/script.js"></script>
</body>
</html>