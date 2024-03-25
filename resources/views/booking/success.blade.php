<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Successful</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 20px;
            background-color: #f0f2f5; /* A light background to contrast with the green accents */
        }
        .success-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .success-header {
            background-color: #28a745; /* Bootstrap's success green */
            color: #fff;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            margin: -20px -20px 20px -20px; /* Align with outer container edges */
        }
        .success-body {
            text-align: center;
        }
        .success-icon {
            color: #28a745; /* Echoing the green theme */
            font-size: 48px; /* Large icon for emphasis */
        }
        .btn-success-custom {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            transition: background-color 0.2s;
        }
        .btn-success-custom:hover {
            background-color: #218838; /* A slightly darker green on hover */
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-header">
            <h1>Booking Confirmed</h1>
        </div>
        <div class="success-body">
            <i class="success-icon bi bi-check-circle-fill"></i> <!-- You can replace with an actual icon from Bootstrap Icons -->
            <h2 class="my-4">Thank You for Your Booking!</h2>
            <p>Your booking has been successfully processed. We're excited to have you aboard and look forward to providing you with an unforgettable experience.</p>
            <a href="/" class="btn btn-success-custom mt-3">Return Home</a>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
