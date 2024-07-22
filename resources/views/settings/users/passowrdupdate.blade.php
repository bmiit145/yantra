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
                    <img src="{{ asset('images/logo.png') }}" alt="Avatar" class="avatar">
                    </div>
                <h2 class="common_title"></h2>
                <form action="{{ route('login.updatePassword') }}" method="post">
                    @csrf
                    <div class="form_inner">
                    <label for="uname">Name</label>
                    <input type="text" placeholder="name" name="name" value="{{ $user->name }}" disabled>
                    <label for="uname">Email</label>
                    <input type="email" placeholder="Email" name="email" value="{{ $user->email }}" disabled>

                    <label for="psw">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <label for="psw">Confirm Password</label>
                    <input type="password" placeholder="Enter Confirm Password" name="password_confirmation" required>

                    <button class="common_btn" type="submit">Reset Password</button>


                    </div>
                </form>
               
            </div>
        </div>
    </div>
</section>

</body>
</html>
