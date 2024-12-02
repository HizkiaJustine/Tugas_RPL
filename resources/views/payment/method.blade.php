<!DOCTYPE html>
<html>
<head>
    <title>Select Payment Method</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Select Payment Method</h1>
        <form action="{{ route('payment_success') }}" method="get">
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select name="payment_method" id="payment_method" class="form-control">
                    <option value="gopay">Gopay</option>
                    <option value="paypal">PayPal</option>
                    <option value="qris">QRIS</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Proceed to Payment</button>
        </form>
    </div>
</body>
</html>