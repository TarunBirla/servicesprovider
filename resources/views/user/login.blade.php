<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sanshakti</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #fc7d32 0%, #e2b700 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        /* Top Associate Button - Fixed positioning */
        .top-associate-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1001;
        }

        .top-associate-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            color: #ffffff;
            background: linear-gradient(135deg, #FA822D 0%, #ff6103 100%);
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(250, 130, 45, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .top-associate-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(250, 130, 45, 0.4);
            background: linear-gradient(135deg, #ff6103 0%, #FA822D 100%);
        }

        .top-associate-link:active {
            transform: translateY(0);
        }

        .top-associate-link i {
            font-size: 16px;
        }

        /* Alert Styles */
        .alert {
            position: fixed;
            top: 80px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            max-width: 400px;
            backdrop-filter: blur(10px);
            animation: slideIn 0.3s ease-out;
        }

        .alert-danger {
            background: rgba(231, 76, 60, 0.95);
            color: white;
            border: 1px solid rgba(231, 76, 60, 0.3);
        }

        .alert-success {
            background: rgba(39, 174, 96, 0.95);
            color: white;
            border: 1px solid rgba(39, 174, 96, 0.3);
        }

        .alert ul {
            list-style: none;
            margin: 0;
        }

        .alert li {
            margin-bottom: 5px;
        }

        .alert li:last-child {
            margin-bottom: 0;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 600px;
        }

        .image-section {
            background:linear-gradient(45deg, #ff6103, #c3b2b2);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .image-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="50" cy="10" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="10" cy="60" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="90" cy="40" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        }

        .welcome-content {
            text-align: center;
            color: white;
            z-index: 1;
            position: relative;
            padding: 40px;
        }

        .welcome-content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 300;
        }

        .welcome-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .form-section {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            font-family: 'Billabong', cursive;
            font-size: 2.5rem;
            color: #FA822D;
            margin-bottom: 10px;
            font-weight: 400;
        }

        .form-header h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .form-header p {
            color: #666;
            font-size: 1rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #FA822D;
            background: white;
            box-shadow: 0 0 0 3px rgba(250, 130, 45, 0.1);
        }

        .form-group i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            transition: color 0.3s ease;
        }

        .form-group input:focus + i {
            color: #FA822D;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 25px;
        }

        .forgot-password a {
            color: #FA822D;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #ff6103;
        }

        .submit-btn {
            background: linear-gradient(135deg, #f97600 0%, #ada4a3 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(249, 118, 0, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .form-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .form-links a {
            color: #FA822D;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        

        .form-links a:hover {
            color: #ff6103;
        }
       input[type="radio"] {
  accent-color: #ff6103; /* Changes the color of the radio */
}
        

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 20%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 20%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 30%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Remove the old associate link style since we're not using it anymore */
        .associate-link {
            display: none;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .container {
                grid-template-columns: 1fr;
                margin: 0;
            }

            .image-section {
                min-height: 200px;
            }

            .welcome-content h2 {
                font-size: 1.8rem;
            }

            .form-section {
                padding: 40px 30px;
            }

            .form-header h1 {
                font-size: 1.5rem;
            }

            .logo {
                font-size: 2rem;
            }

            .form-links {
                justify-content: center;
                text-align: center;
            }

            .alert {
                position: static;
                margin-bottom: 20px;
                max-width: 100%;
            }

            .top-associate-container {
                position: fixed;
                top: 10px;
                right: 10px;
            }

            .top-associate-link {
                padding: 10px 18px;
                font-size: 12px;
            }

            .top-associate-link i {
                font-size: 14px;
            }
        }

        /* Loading animation for submit button */
        .submit-btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .submit-btn.loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            margin: auto;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Password visibility toggle */
        .password-toggle {
            cursor: pointer;
            user-select: none;
        }

        .password-toggle:hover {
            color: #FA822D !important;
        }
    </style>
</head>
<body>
    
    <!-- Top Associate Button -->
    <div class="top-associate-container">
        <a href="{{ route('register.associate') }}" class="top-associate-link">
            <i class="fas fa-handshake"></i>
            Associate with us
        </a>
    </div>

    <!-- Error and Success Messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <div class="container">
        
        <div class="image-section">
            <div class="floating-shapes">
                <div class="shape"></div>
                <div class="shape"></div>
                <div class="shape"></div>
            </div>
            <div class="welcome-content">
                <h2>Welcome Back!</h2>
                <p>Sign in to your account to continue your journey with us. We're excited to have you back!</p>
            </div>
        </div>

        <div class="form-section">
            <div class="form-header">
                <div class="logo">Sanshakti</div>
                <h1>Sign In</h1>
                <p>Enter your credentials to access your account</p>
            </div>

            <form id="loginForm" action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                    <i class="fas fa-envelope"></i>
                </div>

                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                </div>

                <div class="row form-links">
                    <a>
                            <input class="form-check-input" type="radio" >
                            <label class="form-check-label" for="remember">
                                User
                            </label>
                    </a>

                     <a>
                            <input class="form-check-input" type="radio" >
                            <label class="form-check-label" >
                                Asssociate
                            </label>
                    </a>
                </div>
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    Sign In
                </button>

                <div class="form-links">
                    <a href="{{ route('register') }}">Create Account</a>
                    <a href="{{ route('login') }}">Back to Home</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Password visibility toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const toggleIcon = this;
            
            if (password.type === 'password') {
                password.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });

        // Add loading state to form submission
        document.getElementById('loginForm').addEventListener('submit', function() {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.classList.add('loading');
            submitBtn.textContent = 'Signing In...';
        });

        // Add focus animations to form inputs
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.parentElement.classList.remove('focused');
                }
            });
        });

        // Auto-hide alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.animation = 'slideOut 0.3s ease-in forwards';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }, 5000);
        });

        // Add slideOut animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Form validation feedback
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        emailInput.addEventListener('input', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
                this.style.borderColor = '#e74c3c';
            } else {
                this.style.borderColor = '#e1e5e9';
            }
        });

        passwordInput.addEventListener('input', function() {
            if (this.value.length > 0 && this.value.length < 6) {
                this.style.borderColor = '#f39c12';
            } else {
                this.style.borderColor = '#e1e5e9';
            }
        });

        // Add click tracking for associate button
        document.querySelector('.top-associate-link').addEventListener('click', function(e) {
            // Add any tracking or analytics here if needed
            console.log('Associate button clicked');
        });
    </script>
</body>
</html>