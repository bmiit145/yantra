<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/login.css')
</head>
<body>


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

{{--                 Display success Message --}}
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
                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">

                    <label for="psw">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <div style="display: flex">
                        <input type="text" placeholder="Enter OTP" name="otp" required>
                        <button class="common_btn send_otp" type="button" style="width: 27%">Send OTP</button>
                    </div>
                   

                    <button class="common_btn" type="submit">Login</button>

                    </div>
                </form>
                <div class="form_inner_bottom">
                    <a href="#">Reset Password</a>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
