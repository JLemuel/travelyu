<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #28a745;
            color: #ffffff;
            padding: 20px 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
        }
        .logo {
            max-width: 100%; /* Makes the image responsive */
            height: auto; /* Maintains aspect ratio */
            width: 150px; /* Adjust based on your logo */
            margin: 0 auto; /* Centers the logo */
            display: block;
        }
        .content {
            line-height: 1.6;
            color: #333333;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #aaaaaa;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo Image -->
            <img src="{{ asset('assets/travelyu_logo1.png') }}" alt="Travelyu" class="logo" />
            <h2>New Contact Form Submission</h2>
        </div>
        <div class="content">
            <p>You have a new contact form submission:</p>
            <p><strong>Name:</strong> {{ $details['name'] }}</p>
            <p><strong>Email:</strong> {{ $details['email'] }}</p>
            <p><strong>Message:</strong> {{ $details['message'] }}</p>
            <!-- <a href="https://yourwebsite.com/dashboard" class="button">View Submission</a> -->
        </div>
        <div class="footer">
            <p>This is an automated message. Please do not reply directly to this email.</p>
        </div>
    </div>
</body>
</html>
