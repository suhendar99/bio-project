<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | B I O F A R M A</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="margin: 20px; padding: 20px;">
            <div class="col-md-12 col-sm-12">
                <div class="card" style="border-radius: 20px;">
                    <div class="row" style="margin: 30px;">
                        <div class="col-md-7 col-sm-0" style="padding: 20px;">
                            <center>
                                <img src="{{ asset('svg/medicine.svg') }}" alt="" width="100%">
                            </center>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <form method="post" action="{{ route('login') }}" >
                                @csrf
                                <center>
                                    <img src="{{ asset('svg/avatar.svg') }}" class="avatar" alt="" width="100px">
                                    <h2>BIOFARMA</h2>
                                    <span>Login to Start Monitoring</span>
                                    <div class="form-group" style="margin-top: 20px;">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" style="border-radius: 30px; height: 50px;">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" style="border-radius: 30px; height: 50px;">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" style="background: #0064c8; border-radius: 30px; margin-top: 20px; color: white; height: 50px;" class="form-control btn" >Login</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>