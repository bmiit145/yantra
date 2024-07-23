<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 Internal Server Error</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #6c757d;
        }
        .container {
            text-align: center;
        }
        .container h1 {
            font-size: 10rem;
            margin: 0;
        }
        .container p {
            font-size: 1.25rem;
            margin: 0;
        }
        .container img {
            width: 300px;
            margin: 20px 0;
        }
        .container a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #17a2b8;
            text-decoration: none;
            border-radius: 5px;
        }
        .container a:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>500</h1>
        <img src="{{ asset('images/error/error500.png') }}" alt="Error Image">
        <p>Internal Server Error!</p>
        <p>Server Error 500. We're not exactly sure what happened, but our servers say something is wrong.</p>
        <a href="{{ route('login') }}">Back to home</a>
    </div>
</body>
</html>
