<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Medical Records</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .records-section {
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
    </style>
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>My Medical Records</x-header>

    @if($records->isEmpty())
        <p>Data anda belum terdaftar</p>
    @else
        <section id="records" class="records-section">
            <h2>Daftar Rekam Medis</h2>
            @foreach($records as $record)
                <div class="card">
                    <h3>{{ $record->Tanggal }}</h3>
                    <p>Dokter: {{ $record->dokter->NamaDokter }}</p>
                    <p>Hasil Diagnosa: {{ $record->HasilDiagnosa }}</p>
                    <p>Perawatan: {{ $record->Perawatan }}</p>
                    <p>Resep Obat: {{ $record->ResepObat }}</p>
                    <p>Hasil Lab: {{ $record->HasilLab }}</p>
                </div>
            @endforeach
        </section>
    @endif

    <x-footer></x-footer>

    <script src="js/script.js"></script>
</body>
</html>