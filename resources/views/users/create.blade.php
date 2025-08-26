<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - StockPro</title>
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
        
        .register-container {
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
            padding: 30px;
        }
        
        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 25px;
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
        
        .file-upload {
            position: relative;
            overflow: hidden;
        }
        
        .file-upload-input {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
            cursor: pointer;
        }
        
        .file-upload-label {
            display: block;
            padding: 10px 15px;
            background: var(--light-bg);
            border: 1px dashed #ccc;
            border-radius: var(--border-radius);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .file-upload-label:hover {
            background: #e9ecef;
            border-color: var(--secondary-color);
        }
        
        .file-name {
            font-size: 0.85rem;
            margin-top: 5px;
            color: #6c757d;
        }
        
        .btn-register {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: var(--border-radius);
            transition: all 0.3s;
            width: 100%;
            color: white;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: white;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
        
        .login-link a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .brand-section {
                padding: 30px 20px;
            }
            
            .form-section {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <div class="row g-0">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="brand-section">
                        <div class="brand-logo">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <h2>StockPro</h2>
                        <p>Efficient inventory management for modern businesses</p>
                        <div class="mt-5 pt-4">
                            <h4><i class="fas fa-lock me-2"></i>Secure Registration</h4>
                            <p class="mt-3">Your data is protected with industry-standard encryption</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-section">
                        <h3 class="section-title">Create Your Account</h3>
                        
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your full name">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" required placeholder="your.email@example.com">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="+1 (555) 123-4567">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nid-number" class="form-label">NID Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <input type="text" class="form-control" id="nid-number" name="nid-number" placeholder="National ID Number">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        <input type="password" class="form-control" id="password" name="password" required placeholder="Create a strong password">
                                        <span class="input-group-text password-toggle" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Confirm your password">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nid_verification_photo" class="form-label">NID Verification Photo</label>
                                    <div class="file-upload">
                                        <label class="file-upload-label" for="nid_verification_photo">
                                            <i class="fas fa-cloud-upload-alt me-2"></i>Choose NID Photo
                                        </label>
                                        <input type="file" class="file-upload-input" id="nid_verification_photo" name="nid_verification_photo">
                                        <div class="file-name" id="nid-file-name">No file chosen</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="user_photo" class="form-label">User Photo</label>
                                    <div class="file-upload">
                                        <label class="file-upload-label" for="user_photo">
                                            <i class="fas fa-cloud-upload-alt me-2"></i>Choose Profile Photo
                                        </label>
                                        <input type="file" class="file-upload-input" id="user_photo" name="user_photo">
                                        <div class="file-name" id="profile-file-name">No file chosen</div>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-register">Register <i class="fas fa-user-plus ms-2"></i></button>
                        </form>
                        
                        <div class="login-link">
                            Already have an account? <a href="{{ route('login') }}">Login here</a>
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
            
            // File input handlers
            const nidFileInput = document.getElementById('nid_verification_photo');
            const profileFileInput = document.getElementById('user_photo');
            const nidFileName = document.getElementById('nid-file-name');
            const profileFileName = document.getElementById('profile-file-name');
            
            nidFileInput.addEventListener('change', function() {
                nidFileName.textContent = this.files[0] ? this.files[0].name : 'No file chosen';
            });
            
            profileFileInput.addEventListener('change', function() {
                profileFileName.textContent = this.files[0] ? this.files[0].name : 'No file chosen';
            });
        });
    </script>
</body>
</html>