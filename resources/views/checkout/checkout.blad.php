<h1>User Orders</h1>
<table border="1">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>User Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($carts as $cart)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->productuser->name }}</td>
            <td>{{ $order->productuser->address }}</td>
            <td>{{ $order->productuser->phone }}</td>
            <td>{{ $order->product_id }}</td>
            <td>{{ $order->quantity }}</td>
            <td>${{ $order->price }}</td>
            <td>${{ $order->total }}</td>
            <td>{{ $order->created_at->format('Y-m-d') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>