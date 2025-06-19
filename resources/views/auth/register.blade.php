<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>          
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @if ($errors->has('password'))
                <span class="help-block ">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>  
        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="{{ route('login') }}" class="btn btn-secondary">Already have an account? Login</a>
        </div>
    </form>
   
</body>
</html> -->








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <style>
        body {
            background-color: #fafafa;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        .top-link a{
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .img1 {
            width: 100%;
            border-radius: 15px;
        }

        .login-box {
            width: 100%;
            max-width: 350px;
            padding: 40px;
            border-radius: 10px;
        }

        .login-box .form-control {
            margin-bottom: 10px;
        }

        .login-box .btn {
            width: 100%;
        }

        .or-divider {
            text-align: center;
            margin: 15px 0;
            position: relative;
        }

        .or-divider::before,
        .or-divider::after {
            content: "";
            height: 1px;
            background: #ccc;
            width: 40%;
            position: absolute;
            top: 50%;
        }

        .or-divider::before {
            left: 0;
        }

        .or-divider::after {
            right: 0;
        }

        .or-divider span {
            background: #fff;
            padding: 0 10px;
            color: #999;
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
                padding: 20px;
            }

            .top-link {
                position: static;
                text-align: right;
                width: 100%;
                margin-bottom: 10px;
            }

            .img1 {
                margin-bottom: 20px;
            }
        }
    </style>

<main class="main">
    <div class="container main-container">

       

        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center align-items-center">
                <img class="img1" src="https://media.istockphoto.com/id/1281150061/vector/register-account-submit-access-login-password-username-internet-online-website-concept.jpg?s=612x612&w=0&k=20&c=9HWSuA9IaU4o-CK6fALBS5eaO1ubnsM08EOYwgbwGBo=" alt="Demo Image">
            </div>

            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <div class="login-box">
                   <form action="{{ route('register') }}" method="POST">
        @csrf
        <h3 class="text-center mb-4 font-weight-bold" style="font-family: 'Billabong', cursive;">Register</h3>
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>          
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" name="email" id="email" placeholder="Email"  class="form-control" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password" placeholder="Password" id="password" class="form-control" required>
            @if ($errors->has('password'))
                <span class="help-block ">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>  
        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control" required>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="{{ route('login') }}" >Already have an account? Login</a>
        </div>
    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>