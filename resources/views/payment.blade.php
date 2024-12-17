<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-primary mb-4">Order Details</h2>

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Name:</strong> {{ $order->name }}</p>
                <p><strong>Address:</strong> {{ $order->address }}</p>
                <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>
            </div>
        </div>

        <h3 class="text-secondary">Items</h3>
        <ul class="list-group mb-4">
            @foreach($order->items as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $item->name }}</strong> - {{ $item->quantity }} x ${{ $item->price }}
                </div>
                <span class="badge bg-primary rounded-pill">${{ $item->total_price }}</span>
            </li>
            @endforeach
        </ul>

        <h3 class="text-secondary">Payment</h3>
        <a href="{{ url('/process-payment/' . $order->id) }}" class="btn btn-success">Proceed to Payment</a>


    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>