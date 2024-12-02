<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>Profile</x-header>

    @if (session('error'))
        <div style="background-color: rgb(247, 162, 162); color: rgb(163, 10, 10); margin-top: 20px; height: 40px; display: flex; align-items: center; justify-content: center; text-align: left; padding: 0 10px;">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div style="background-color: rgb(162, 247, 195); color: rgb(10, 106, 16); margin-top: 20px; height: 40px; display: flex; align-items: center; justify-content: center; text-align: left; padding: 0 10px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <h1>Profile</h1>
        <p><strong>Name:</strong> {{ $pasien->NamaPasien }}</p>
        <p><strong>Email:</strong> {{ $account->email }}</p>
        <p><strong>Role:</strong> {{ $account->Role }}</p>
        <p><strong>Address:</strong> {{ $pasien->AlamatPasien }}</p>
        <p><strong>Phone:</strong> {{ $pasien->NomorHP }}</p>
        <p><strong>Age:</strong> {{ $pasien->UmurPasien }}</p>
        <p><strong>Weight:</strong> {{ $pasien->BeratBadanPasien }}</p>
        <p><strong>Height:</strong> {{ $pasien->TinggiBadanPasien }}</p>
        <p><strong>Date of Birth:</strong> {{ $pasien->TanggalLahirPasien }}</p>
        <p><strong>Gender:</strong> {{ $pasien->JenisKelamin }}</p>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>

    <x-footer></x-footer>

    <script src="js/script.js"></script>
</body>
</html>