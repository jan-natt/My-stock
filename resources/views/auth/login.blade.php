<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StockPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-bg: #f8f9fa;
            --border-radius: 8px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
        }
        
        .login-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .brand-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .brand-logo {
            font-size: 3.5rem;
            margin-bottom: 20px;
        }
        
        .brand-section h2 {
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .brand-section p {
            opacity: 0.9;
        }
        
        .form-section {
            padding: 40px;
        }
        
        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--secondary-color);
        }
        
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }
        
        .form-control {
            padding: 12px 15px;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        
        .input-group-text {
            background-color: white;
            border-radius: var(--border-radius) 0 0 var(--border-radius);
        }
        
        .password-toggle {
            cursor: pointer;
            background-color: white;
            border-left: none;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
        }
        
        .btn-login {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: var(--border-radius);
            transition: all 0.3s;
            width: 100%;
            color: white;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: white;
        }
        
        .form-check-input:checked {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        
        .register-link {
            text-align: center;
            margin-top: 25px;
            color: #6c757d;
        }
        
        .register-link a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
        }
        
        .social-login {
            margin-top: 25px;
            text-align: center;
        }
        
        .social-divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .social-divider::before,
        .social-divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        
        .social-divider span {
            padding: 0 10px;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        
        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s;
        }
        
        .social-btn:hover {
            transform: translateY(-3px);
        }
        
        .btn-google {
            background: #DB4437;
        }
        
        .btn-facebook {
            background: #4267B2;
        }
        
        .btn-twitter {
            background: #1DA1F2;
        }
        
        @media (max-width: 768px) {
            .brand-section {
                padding: 30px 20px;
            }
            
            .form-section {
                padding: 25px 20px;
            }
            
            .login-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="row g-0">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="brand-section">
                        <div class="brand-logo">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <h2>StockPro</h2>
                        <p>Efficient inventory management for modern businesses</p>
                        <div class="mt-5 pt-4">
                            <h4><i class="fas fa-lock me-2"></i>Secure Login</h4>
                            <p class="mt-3">Access your account with confidence</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-section">
                        <h3 class="section-title">Login to Your Account</h3>
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                    <span class="input-group-text password-toggle" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Login') }} <i class="fas fa-sign-in-alt ms-2"></i>
                                </button>
                            </div>
                            
                            <div class="login-options">
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                        
                        <div class="social-login">
                            <div class="social-divider">
                                <span>Or login with</span>
                            </div>
                            <div class="social-buttons">
                                <a href="#" class="social-btn btn-google">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a href="#" class="social-btn btn-facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-btn btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="register-link">
                            Don't have an account? <a href="{{ route('register') }}">Register here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password visibility toggle
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>