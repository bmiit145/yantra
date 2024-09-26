<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f3f3f3;
            text-align: center;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        .button {
            background-color: #7d3c98;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #5a237e;
        }
        footer {
            margin-top: 20px;
            color: #777;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>You Have a New Message</h2>
    <!-- <p>Dear Recipient,</p> -->
    
    <p>{{ $messageData['content'] ?? 'No message content provided.' }}</p>
    <p>Your email: <strong>{{ $recipientEmail }}</strong></p>        

    <a href="mailto:{{ $recipientEmail }}" class="button">Reply</a>
    
    <hr>
    <footer>
        <p>--<br>The YantraDesign Team</p>
        <p>
            YantraDesign<br>
            <a href="mailto:info@yantradesign.co.in">info@yantradesign.co.in</a> | 
            <a href="http://yantradesign.co.in">yantradesign.co.in</a>
        </p>
    </footer>
</div>
</body>
</html>
