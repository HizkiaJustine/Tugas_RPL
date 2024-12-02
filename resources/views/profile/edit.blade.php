<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>Edit Profile</x-header>

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
        <h1>Edit Profile</h1>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="NamaPasien">Name</label>
                <input type="text" class="form-control" id="NamaPasien" name="NamaPasien" value="{{ $pasien->NamaPasien }}">
            </div>
            <div class="form-group">
                <label for="AlamatPasien">Address</label>
                <input type="text" class="form-control" id="AlamatPasien" name="AlamatPasien" value="{{ $pasien->AlamatPasien }}">
            </div>
            <div class="form-group">
                <label for="NomorHP">Phone</label>
                <input type="text" class="form-control" id="NomorHP" name="NomorHP" value="{{ $pasien->NomorHP }}">
            </div>
            <div class="form-group">
                <label for="UmurPasien">Age</label>
                <input type="number" class="form-control" id="UmurPasien" name="UmurPasien" value="{{ $pasien->UmurPasien }}">
            </div>
            <div class="form-group">
                <label for="BeratBadanPasien">Weight</label>
                <input type="number" class="form-control" id="BeratBadanPasien" name="BeratBadanPasien" value="{{ $pasien->BeratBadanPasien }}">
            </div>
            <div class="form-group">
                <label for="TinggiBadanPasien">Height</label>
                <input type="number" class="form-control" id="TinggiBadanPasien" name="TinggiBadanPasien" value="{{ $pasien->TinggiBadanPasien }}">
            </div>
            <div class="form-group">
                <label for="TanggalLahirPasien">Date of Birth</label>
                <input type="date" class="form-control" id="TanggalLahirPasien" name="TanggalLahirPasien" value="{{ $pasien->TanggalLahirPasien }}">
            </div>
            <div class="form-group">
                <label for="JenisKelamin">Gender</label>
                <select class="form-control" id="JenisKelamin" name="JenisKelamin">
                    <option value="L" {{ $pasien->JenisKelamin == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="P" {{ $pasien->JenisKelamin == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <x-footer></x-footer>

    <script src="js/script.js"></script>
</body>
</html>