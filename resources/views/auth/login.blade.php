<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/login.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <style>
        .send_otp {
            background-color: #00A5A8;
            color: #fff;
            padding: 12px 20px;
            margin: 0 0 15px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            line-height: 1.2;
        }
    </style>


    <section class="login_page_info">
        <div class="container">
            <div class="login_main_info">
                <div class="login_main_row">
                    <div class="imgcontainer">
                        <img src="{{ asset('/images/logo.png') }}" alt="Avatar" class="avatar">
                    </div>
                    <h2 class="common_title">Login</h2>

                    {{-- Display Error Messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" aria-label="Close">&times;</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @if (session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" aria-label="Close">&times;</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf   
                        <div class="form_inner">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Email" name="email"
                                value="{{ old('email') }}" required>

                            <label for="psw">Password</label>
                            <input type="password" placeholder="Enter Password" name="password" required>

                            <div style="display: flex">
                                <input type="text" id="otp" placeholder="Enter OTP" name="otp" required>
                                <button class="send_otp" type="button" style="width: 27%">Generate OTP</button>
                            </div>

                            <button class="common_btn" type="submit" id="loginButton">Login</button>
                        </div>
                    </form>
                    <div class="form_inner_bottom">
                        <a href="#">Reset Password</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('.send_otp').click(function() {
                console.log('hello');
                var email = $('#email').val();


                $.ajax({
                    url: '{{ route('sendOTP') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: email
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>

    <script>
        // Close alert box when the close button is clicked
        document.addEventListener('DOMContentLoaded', function() {
            var closeButtons = document.querySelectorAll('.alert .close');
            closeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var alertBox = this.parentElement;
                    alertBox.style.display = 'none';
                });
            });
        });

        // reset btn click as take a email input and set a href as /reset-password/{encEmail}
        document.querySelector('.form_inner_bottom a').addEventListener('click', function(e) {
            e.preventDefault();
            var email = document.querySelector('input[name="email"]').value;
            if (email) {
                window.location.href = '/reset-password/' + email;
            } else {
                alert('Please enter email address');
            }
        });
    </script>
    

</body>

</html>
