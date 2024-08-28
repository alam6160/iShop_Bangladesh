<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Order Confirmation</h1>

    <p>Dear {{ $order['name'] }},</p>

    <p>Thank you for your order! Here are the details:</p>

    <p><strong>Invoice No:</strong> {{ $order['invoice_no'] }}</p>
    <p><strong>Order Amount:</strong> {{ $order['amount'] }} BDT</p>
    <p><strong>Payment Type:</strong> {{ $order['payment_type'] }}</p>
    <p><strong>Order Date:</strong> {{ $order['order_date'] }}</p>

    <h2>Products Ordered:</h2>
    <ul>
        @foreach($order['products'] as $product)
            <li>{{ $product }}</li>
        @endforeach
    </ul>

    <p>If you have any questions or concerns, feel free to contact us at support@rifamart.com.</p>

    <p>Thank you for shopping with us!</p>

    <p>Best regards,<br>Rifa Mart</p>
</body>
</html>
