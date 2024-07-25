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

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form_inner">
                    <label for="uname">Email</label>
                    <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">

                    <label for="psw">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" required>

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
</script>

</body>
</html>
