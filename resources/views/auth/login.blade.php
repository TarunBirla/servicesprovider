<!-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/associate/assets/css/styles.min.css') }}" />


</head>

<body>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('/assets/images/logos/logo.svg') }}" alt="">
                </a>
                <p class="text-center">Login</p>
                <form action="{{ route('login') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"   aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>    
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    
                    <a class="text-primary fw-bold" href="{{ route('password.request') }}">Forgot Password ?</a>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <a class="text-primary fw-bold ms-2" href="{{ route('register.associate') }}">Create an account</a>
                    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html> -->


















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/associate/assets/css/styles.min.css') }}" />
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

     @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

<main class="main">
    <div class="container main-container">

     

        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center align-items-center">
                <img class="img1" src="https://media.istockphoto.com/id/1281150061/vector/register-account-submit-access-login-password-username-internet-online-website-concept.jpg?s=612x612&w=0&k=20&c=9HWSuA9IaU4o-CK6fALBS5eaO1ubnsM08EOYwgbwGBo=" alt="Demo Image">
            </div>

            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <div class="login-box">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h3 class="text-center mb-4 font-weight-bold" style="font-family: 'Billabong', cursive;">Sun Shakti</h3>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"   aria-describedby="emailHelp">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                        <button class="btn btn-primary">Log In</button>
                        <p class="text-center"><a href="{{ route('password.request') }}">Forgot password?</a></p>
                         <div class="d-flex align-items-center justify-content-center">
                    <a class="text-primary fw-bold ms-2" href="{{ route('register.associate') }}">Create an account</a>
                    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Login</a>
                  </div>
                        <!-- <div class="signup-link">
                            <p>Don't have an account? <a href="#">Sign up</a></p>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
 <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>