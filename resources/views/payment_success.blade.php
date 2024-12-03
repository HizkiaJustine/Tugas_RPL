<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>Payment Successful</x-header>

    <section id="payment-success" class="payment-success-section">
        <h2>Thank You!</h2>
        <p>Your payment was successful. Your appointment status has been updated to Ongoing.</p>
        <a href="{{ route('appointments.show') }}" class="button-86" role="button">View My Appointments</a>
    </section>

    <x-footer></x-footer>

    <script src="js/script.js"></script>
</body>
</html>