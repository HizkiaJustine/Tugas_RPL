<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .appointments-section {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 600px;
            text-align: center;
        }
        .card h3 {
            margin-bottom: 10px;
            font-size: 1.5em;
            color: #333;
        }
        .card p {
            margin-bottom: 10px;
            color: #666;
        }
        .card .status {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>My Appointments</x-header>

    @if($appointments->isEmpty())
        <p>Data anda belum terdaftar</p>
    @else
        <section id="appointments" class="appointments-section">
            <h2>Daftar Janji Temu</h2>
            @foreach($appointments as $appointment)
                <div class="card">
                    <h3>{{ $appointment->Tujuan }}</h3>
                    <p>{{ $appointment->TanggalJanjiTemu }} at {{ $appointment->JamJanjiTemu }}</p>
                    @if(Auth::user()->Role == 'pasien')
                        <p>Dokter: {{ $appointment->dokter->NamaDokter }}</p>
                    @elseif(Auth::user()->Role == 'dokter')
                        <p>Pasien: {{ $appointment->pasien->NamaPasien }}</p>
                    @endif
                    <p class="status">Status: {{ $appointment->Status }}</p>
                </div>
            @endforeach
        </section>
    @endif

    <x-footer></x-footer>

    <script src="js/script.js"></script>
</body>
</html>