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

        {{-- Top Right Link --}}
        <div class="top-link">
            <a href="/register/associate">Associate With as</a>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center align-items-center">
                <img class="img1" src="https://media.istockphoto.com/id/1281150061/vector/register-account-submit-access-login-password-username-internet-online-website-concept.jpg?s=612x612&w=0&k=20&c=9HWSuA9IaU4o-CK6fALBS5eaO1ubnsM08EOYwgbwGBo=" alt="Demo Image">
            </div>

            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <div class="login-box">
                    <h3 class="text-center mb-4 font-weight-bold" style="font-family: 'Billabong', cursive;">Instagram</h3>
                    <input type="text" class="form-control" placeholder="Phone number, username, or email">
                    <input type="password" class="form-control" placeholder="Password">
                    <button class="btn btn-primary">Log In</button>

                    <div class="or-divider"><span>OR</span></div>

                    <button class="btn btn-outline-primary btn-block mb-2">
                        <i class="fab fa-facebook-square"></i> Log in with Facebook
                    </button>
                    <p class="text-center"><a href="#">Forgot password?</a></p>

                    <div class="signup-link">
                        <p>Don't have an account? <a href="#">Sign up</a></p>
                    </div>
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