<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .card {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #28a745;
            color: #fff;
            font-size: 20px;
            font-weight: bold;
        }

        .card-body {
            text-align: center;
        }

        .btn-success {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Payment Successful
            </div>
            <div class="card-body">
                <h5 class="card-title">Thank you for your purchase!</h5>
                <p class="card-text">Your payment has been processed successfully. We appreciate your business.</p>
                <p>Your transaction ID: <strong>#123456789</strong></p>
                <p>If you have any questions, feel free to <a href="mailto:support@example.com">contact us</a>.</p>
                <a href="/" class="btn btn-success btn-block">Back to Home</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>