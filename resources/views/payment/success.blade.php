<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .success-section {
            max-width: 600px;
            margin: 2rem auto;
            padding: 3rem 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        .success-icon {
            color: #4CAF50;
            font-size: 5rem;
            margin-bottom: 1.5rem;
        }
        .success-title {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .success-message {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        .view-button {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 1rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .view-button:hover {
            background: #45a049;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>Pembayaran Berhasil</x-header>

    <section class="success-section">
        <i class="bi bi-check-circle-fill success-icon"></i>
        <h2 class="success-title">Terima Kasih!</h2>
        <p class="success-message">Pembayaran Anda telah berhasil diproses.<br>Janji temu Anda telah dikonfirmasi.</p>
        <a href="{{ route('appointments.show') }}" class="view-button">
            Lihat Janji Temu Saya
        </a>
    </section>

    <x-footer></x-footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>