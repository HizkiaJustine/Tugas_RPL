<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembayaran</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .payment-section {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .payment-options {
            display: grid;
            gap: 1rem;
            margin: 2rem 0;
        }
        .payment-option {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            border: 1px solid #e9ecef;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        .payment-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .payment-option input[type="radio"] {
            margin-right: 1rem;
        }
        .payment-option label {
            font-size: 1.1rem;
            color: #495057;
            cursor: pointer;
        }
        .submit-button {
            background: #4CAF50;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1rem;
            transition: background 0.3s ease;
        }
        .submit-button:hover {
            background: #45a049;
        }
        .section-title {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .section-description {
            color: #6c757d;
            text-align: center;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>Pilih Metode Pembayaran</x-header>

    <section class="payment-section">
        <h2 class="section-title">Pilih Metode Pembayaran Anda</h2>
        <p class="section-description">Silakan pilih metode pembayaran yang paling nyaman untuk Anda</p>

        <form action="{{ route('payment.process') }}" method="POST">
            @csrf
            <div class="payment-options">
                <div class="payment-option">
                    <input type="radio" name="MetodePembayaran" value="Online" id="online" required>
                    <label for="online">Transfer Bank Online</label>
                </div>
                <div class="payment-option">
                    <input type="radio" name="MetodePembayaran" value="Cash" id="cash" required>
                    <label for="cash">Pembayaran Tunai</label>
                </div>
                <div class="payment-option">
                    <input type="radio" name="MetodePembayaran" value="Credit" id="credit" required>
                    <label for="credit">Kartu Kredit</label>
                </div>
                <div class="payment-option">
                    <input type="radio" name="MetodePembayaran" value="Debit card" id="debit" required>
                    <label for="debit">Kartu Debit</label>
                </div>
            </div>
            
            <button type="submit" class="submit-button">
                Lanjutkan Pembayaran
            </button>
        </form>
    </section>

    <x-footer></x-footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>