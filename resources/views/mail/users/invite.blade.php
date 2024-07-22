{{-- <!DOCTYPE html>
<html>
<head>
    <title>You are invited</title>
</head>
<body>
    <p>You have been invited to join our platform. Click the link below to link and set Password</p>
    <p><a href="{{ $link }}">Set Passowrd</a></p>
</body>
</html> --}}



<!DOCTYPE html>
<html>
<head>
    <title>Invitation to Connect on Odoo</title>
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
            text-align: center;
            background-color: #f3f3f3;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .button {
            background-color: #7d3c98;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #5a237e;
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; width: 100%; height: 100%; background-color: #f3f3f3; text-align: center;">
    <table role="presentation" style="width: 100%; height: 100%; background-color: #f3f3f3; text-align: center;">
        <tr>
            <td style="padding: 20px;">
                <table role="presentation" style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center;">
                    <tr>
                        <td>
                            <p>Welcome to Odoo</p>
                            <h2>{{ $user->name }}</h2>
                            <p>Dear {{ $user->name }},</p>
                            <p>You have been invited by <a href="mailto:info@yantradesign.co.in">info@yantradesign.co.in</a> of YantraDesign to connect on.</p>
                            <p><a href="{{ $link }}" style="background-color: #7d3c98; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">Accept Invitation</a></p>
                            <p>Your sign-in email is: {{ $user->email }}</p>
                            {{-- <p>Never heard of Odoo? It's an all-in-one business software used by 7+ million users. It will considerably improve your experience at work and increase your productivity.</p>
                            <p>Have a look at the <a href="{{ $odooTour }}">Odoo Tour</a> to discover the tool.</p>
                            <p>Enjoy Odoo!</p> --}}
                            <p>--<br>
                            The YantraDesign Team</p>
                            <p>YantraDesign<br>
                            <a href="mailto:info@yantradesign.co.in">info@yantradesign.co.in</a> | <a href="http://yantradesign.co.in">http://yantradesign.co.in</a></p>
                            {{-- <p>Powered by Odoo</p> --}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

