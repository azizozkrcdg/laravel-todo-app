@extends('layouts.app')
@section('title', 'kayıt ol')

@section('content')
<div class="login-container" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">

    {{-- Background Animation Elements --}}
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4">
                {{-- Welcome Header --}}
                <div class="text-center mb-4 welcome-header">
                    <div class="logo-container mb-3">
                        <div class="logo-circle">
                            <i class="bi bi-shield-check text-primary"></i>
                        </div>
                    </div>
                    <h2 class="fw-bold text-dark mb-2">Hoş Geldiniz</h2>
                    <p class="text-muted">Görev yönetimini kullanmak için kayıt olun</p>
                </div>

                {{-- Login Card --}}
                <div class="card border-0 shadow-lg login-card" style="background: rgba(255, 255, 255, 0.98); box-shadow: 0 20px 40px rgba(0,0,0,0.1), 0 6px 20px rgba(0,0,0,0.06) !important;">
                    <div class="card-body p-5">

                        {{-- Flash Messages --}}
                        @include('layouts.flash_message')

                        {{-- Register Form --}}
                        <form action="{{route("register.store")}}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            {{-- name Field --}}
                            <div class="mb-4 form-floating-custom">
                                <label for="name" class="form-label fw-semibold">
                                    <i class="bi bi-person-circle text-primary me-2"></i>Kullanıcı Adı
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text custom-input-icon">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text"
                                           name="name"
                                           id="name"
                                           class="form-control form-control-lg custom-input"
                                           placeholder="Kullanıcı adınızı girin"
                                           required
                                           autofocus>
                                    <div class="invalid-feedback">
                                        Lütfen kullanıcı adınızı giriniz.
                                    </div>
                                </div>
                            </div>

                              <div class="mb-4 form-floating-custom">
                                <label for="email" class="form-label fw-semibold">
                                    <i class="bi bi-envelope-fill text-primary me-2"></i>E-mail
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text custom-input-icon">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email"
                                           name="email"
                                           id="email"
                                           class="form-control form-control-lg custom-input"
                                           placeholder="E-mail adresinizi girin"
                                           required
                                           autofocus>
                                    <div class="invalid-feedback">
                                        Lütfen mail adresinizi giriniz.
                                    </div>
                                </div>
                            </div>

                            {{-- Password Field --}}
                            <div class="mb-4 form-floating-custom">
                                <label for="password" class="form-label fw-semibold">
                                    <i class="bi bi-lock-fill text-warning me-2"></i>Şifre
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text custom-input-icon">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password"
                                           name="password"
                                           id="password"
                                           class="form-control form-control-lg custom-input"
                                           placeholder="Şifrenizi girin"
                                           required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <div class="invalid-feedback">
                                        Lütfen şifrenizi giriniz.
                                    </div>
                                </div>
                            </div>


                            {{-- Register Button --}}
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-lg login-btn">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    <span class="btn-text">Kayıt Ol</span>
                                </button>
                            </div>

                            {{-- Divider --}}
                            <div class="divider">
                                <span>veya</span>
                            </div>

                            {{-- Register Link --}}
                            <div class="text-center">
                                <p class="text-muted mb-0">
                                    Hesabınız var mı?
                                    <a href="{{route("login")}}" class="text-primary fw-semibold text-decoration-none">
                                        Giriş Yapın
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="text-center mt-4 login-footer">
                    <p class="text-muted small mb-0">
                        <i class="bi bi-shield-check me-1"></i>
                        Verileriniz güvenli bir şekilde korunmaktadır
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Main Container */
.login-container {
    position: relative;
    overflow: hidden;
}

/* Floating Background Shapes */
.floating-shapes {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
}

.shape {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(45deg, rgba(13, 110, 253, 0.1), rgba(108, 117, 125, 0.05));
    animation: float 6s ease-in-out infinite;
}

.shape-1 {
    width: 80px;
    height: 80px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.shape-2 {
    width: 120px;
    height: 120px;
    top: 60%;
    right: 15%;
    animation-delay: 2s;
}

.shape-3 {
    width: 60px;
    height: 60px;
    bottom: 30%;
    left: 20%;
    animation-delay: 4s;
}

.shape-4 {
    width: 100px;
    height: 100px;
    top: 10%;
    right: 25%;
    animation-delay: 1s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0.7;
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
        opacity: 0.3;
    }
}

/* Welcome Header */
.welcome-header {
    z-index: 2;
    position: relative;
    animation: fadeInDown 0.8s ease-out;
}

.logo-container {
    animation: bounceIn 1s ease-out 0.3s both;
}

.logo-circle {
    width: 80px;
    height: 80px;
    background: linear-gradient(45deg, #0d6efd, #6f42c1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    box-shadow: 0 10px 30px rgba(13, 110, 253, 0.3);
}

.logo-circle i {
    font-size: 2rem;
    color: white;
}

/* Login Card */
.login-card {
    border-radius: 24px !important;
    z-index: 2;
    position: relative;
    animation: fadeInUp 0.8s ease-out 0.2s both;
    backdrop-filter: blur(10px);
}

/* Form Styling */
.custom-input {
    border: 2px solid #e9ecef;
    border-left: none;
    border-radius: 0 12px 12px 0 !important;
    transition: all 0.3s ease;
    padding: 12px 16px;
}

.custom-input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    transform: translateY(-2px);
}

.custom-input-icon {
    background: linear-gradient(45deg, #0d6efd, #6f42c1);
    border: 2px solid transparent;
    border-radius: 12px 0 0 12px !important;
    color: white;
    width: 50px;
}

.input-group .custom-input:focus + .toggle-password {
    border-color: #0d6efd;
}

.toggle-password {
    border: 2px solid #e9ecef;
    border-left: none;
    border-radius: 0 12px 12px 0 !important;
    transition: all 0.3s ease;
}

.toggle-password:hover {
    background-color: #f8f9fa;
}

/* Custom Checkbox */
.custom-checkbox {
    width: 1.2em;
    height: 1.2em;
    border-radius: 6px;
}

.custom-checkbox:checked {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

/* Login Button */
.login-btn {
    background: linear-gradient(45deg, #0d6efd, #6f42c1);
    border: none;
    border-radius: 12px !important;
    padding: 12px 24px;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.login-btn:hover {
    background: linear-gradient(45deg, #0056b3, #5a359a);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(13, 110, 253, 0.4);
}

.login-btn:active {
    transform: translateY(0);
}

/* Loading State */
.login-btn.loading .btn-text {
    opacity: 0;
}

.login-btn.loading::after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    top: 50%;
    left: 50%;
    margin-left: -10px;
    margin-top: -10px;
    border: 2px solid transparent;
    border-top: 2px solid #ffffff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Divider */
.divider {
    position: relative;
    text-align: center;
    margin: 2rem 0;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #dee2e6;
}

.divider span {
    background: rgba(255, 255, 255, 0.98);
    padding: 0 1rem;
    color: #6c757d;
    font-size: 0.875rem;
}

/* Footer */
.login-footer {
    z-index: 2;
    position: relative;
    animation: fadeInUp 0.8s ease-out 0.4s both;
}

/* Form Validation */
.custom-input.is-invalid {
    border-color: #dc3545;
}

.custom-input.is-valid {
    border-color: #198754;
}

/* Animations */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.3);
    }
    50% {
        opacity: 1;
        transform: scale(1.05);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

/* Flash Messages Styling */
.alert {
    border-radius: 12px !important;
    border: none;
    animation: slideInDown 0.5s ease-out;
}

@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .login-container {
        padding: 10px;
    }

    .card-body {
        padding: 2rem !important;
    }

    .logo-circle {
        width: 60px;
        height: 60px;
    }

    .logo-circle i {
        font-size: 1.5rem;
    }

    .shape {
        display: none;
    }
}

/* Focus States */
.form-label {
    color: #495057;
    margin-bottom: 8px;
}

.custom-input:focus + .form-label,
.custom-input:focus ~ .form-label {
    color: #0d6efd;
}

/* Link Hover Effects */
a {
    transition: all 0.3s ease;
}

a:hover {
    transform: translateY(-1px);
}
</style>

<script>
// Form Validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    // Add loading state
                    const loginBtn = form.querySelector('.login-btn');
                    loginBtn.classList.add('loading');
                    loginBtn.disabled = true;
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Toggle Password Visibility
document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.querySelector('#password');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            const icon = this.querySelector('i');
            icon.classList.toggle('bi-eye');
            icon.classList.toggle('bi-eye-slash');
        });
    }

    // Auto-focus username field
    const usernameInput = document.querySelector('#username');
    if (usernameInput) {
        setTimeout(() => usernameInput.focus(), 500);
    }
});

// Add floating animation to shapes
document.addEventListener('DOMContentLoaded', function() {
    const shapes = document.querySelectorAll('.shape');
    shapes.forEach((shape, index) => {
        shape.style.animationDelay = `${index * 0.5}s`;
    });
});
</script>
@endsection
