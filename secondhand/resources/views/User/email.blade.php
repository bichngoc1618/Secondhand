<!DOCTYPE html>
<html>
<head>
    <title>Order Success Email</title>
</head>
<body>
    <p>Dear {{ Auth::user()->name }},</p>
    <p>Thank you for your order!</p>

    <!-- Hiển thị thông tin đơn hàng -->
    <table border="1">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $grandTotal = 0;
            @endphp

@foreach($orderdetail as $item)
    <tr>
        <td>{{ $item['product_name'] }}</td>
        <td>{{ $item['quantity'] }}</td>
        <td>${{ $item['price'] }}</td>
        <td>${{ $item['price'] * $item['quantity'] }}</td>
    </tr>

    @php
        $grandTotal += $item['price'] * $item['quantity'];
    @endphp
@endforeach


        </tbody>
    </table>

    <p><strong>Grand Total: ${{ $grandTotal }}</strong></p>

    <p>We appreciate your business.</p>
</body>
</html>
