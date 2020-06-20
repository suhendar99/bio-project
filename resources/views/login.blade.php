<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | B I O F A R M A</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <img src="{{ asset('assets/img/wave.png') }}" alt="img-wave" class="wave">
    <div class="container">
        <div class="img">
            <img src="{{ asset('/assets/img/login.svg') }}" alt="">
        </div>
        <div class="login-container">
            <form action="" method="post">
                <img src="{{ asset('assets/img/avatar.svg') }}" class="avatar" alt="">
                <h2>Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>E - mail</h5>
                        <input type="email" name="" id="" class="input">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input type="password" name="" id="" class="input">
                    </div>
                </div>
                <a href="#">Forgot Password ?</a>
                <input type="submit" value="Login" class="btn">
            </form>
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>