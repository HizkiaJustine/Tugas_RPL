
<!DOCTYPE html>
<html>
<head>
    <title>Select Payment Method</title>
</head>
<body>
    <h1>Select Payment Method</h1>
    <form action="{{ route('payment_success') }}" method="get">
        <label>
            <input type="radio" name="payment_method" value="credit_card"> Credit Card
        </label><br>
        <label>
            <input type="radio" name="payment_method" value="paypal"> PayPal
        </label><br>
        <label>
            <input type="radio" name="payment_method" value="bank_transfer"> Bank Transfer
        </label><br>
        <a href="/payment/success"></a>
        <button type="submit">Proceed to Payment</button>
    </form>
</body>
</html>