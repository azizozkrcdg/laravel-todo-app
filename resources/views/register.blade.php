@extends('layouts.app')
@section('title', 'Kayıt Ol')

@section('content')
<div class="login-container">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4">
                {{-- Welcome Header --}}
                <div class="text-center mb-4 welcome-header">
                    <div class="logo-container mb-3">
                        <div class="logo-circle">
                            <i class="bi bi-shield-check"></i>
                        </div>
                    </div>
                    <h2 class="fw-bold text-dark mb-2">Hoş Geldiniz</h2>
                    <p class="text-muted">Görev yönetimini kullanmak için kayıt olun</p>
                </div>

                {{-- Register Card --}}
                <div class="card border-0 shadow-sm login-card">
                    <div class="card-body p-5">

                        {{-- Flash Messages --}}
                        @include('layouts.flash_message')

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Register Form --}}
                        <form action="{{ route('register.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            {{-- Name Field --}}
                            <div class="mb-4 form-floating-custom">
                                <label for="name" class="form-label fw-semibold">
                                    Kullanıcı Adı
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

                            {{-- Email Field --}}
                            <div class="mb-4 form-floating-custom">
                                <label for="email" class="form-label fw-semibold">
                                    E-mail
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
                                           required>
                                    <div class="invalid-feedback">
                                        Lütfen mail adresinizi giriniz.
                                    </div>
                                </div>
                            </div>

                            {{-- Password Field --}}
                            <div class="mb-4 form-floating-custom">
                                <label for="password" class="form-label fw-semibold">
                                    Şifre
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
                                    <span class="btn-text">Kayıt Ol</span>
                                </button>
                            </div>

                            {{-- Divider --}}
                            <div class="divider">
                                <span>veya</span>
                            </div>

                            {{-- Login Link --}}
                            <div class="text-center">
                                <p class="text-muted mb-0">
                                    Hesabınız var mı?
                                    <a href="{{ route('login') }}" class="text-dark fw-semibold text-decoration-none">
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
                        <span class="me-1">✓</span> Verileriniz güvenli bir şekilde korunmaktadır
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Main Container */
.login-container {
    background: #f4f5f7;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* Welcome Header */
.welcome-header {
    animation: fadeInDown 0.5s ease-out;
}

.logo-circle {
    width: 64px;
    height: 64px;
    background: #1f2a44;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.logo-circle i {
    font-size: 1.6rem;
    color: #fff;
}

/* Register Card */
.login-card {
    border-radius: 14px !important;
    animation: fadeInUp 0.5s ease-out 0.1s both;
}

.login-card .card-body {
    padding: 2.75rem !important;
}

/* Form Styling */
.custom-input {
    border: 1px solid #d7dae0;
    border-left: none;
    border-radius: 0 8px 8px 0 !important;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    padding: 11px 14px;
    font-size: 0.95rem;
}

.custom-input:focus {
    border-color: #1f2a44;
    box-shadow: 0 0 0 0.15rem rgba(31, 42, 68, 0.12);
}

.custom-input-icon {
    background: #f0f1f4;
    border: 1px solid #d7dae0;
    border-right: none;
    border-radius: 8px 0 0 8px !important;
    color: #5b6472;
    width: 46px;
    justify-content: center;
}

.toggle-password {
    border: 1px solid #d7dae0;
    border-left: none;
    border-radius: 0 8px 8px 0 !important;
    color: #5b6472;
}

.toggle-password:hover {
    background-color: #f0f1f4;
}

/* Login Button */
.login-btn {
    background: #1f2a44;
    border: none;
    border-radius: 8px !important;
    padding: 11px 24px;
    font-weight: 600;
    font-size: 0.95rem;
    transition: background 0.2s ease;
}

.login-btn:hover {
    background: #161d33;
}

/* Loading State */
.login-btn.loading .btn-text {
    opacity: 0;
}

.login-btn.loading::after {
    content: '';
    position: absolute;
    width: 18px;
    height: 18px;
    top: 50%;
    left: 50%;
    margin-left: -9px;
    margin-top: -9px;
    border: 2px solid transparent;
    border-top: 2px solid #ffffff;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Divider */
.divider {
    position: relative;
    text-align: center;
    margin: 1.75rem 0;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #e3e5ea;
}

.divider span {
    background: #fff;
    padding: 0 1rem;
    color: #8a909c;
    font-size: 0.825rem;
}

/* Footer */
.login-footer {
    animation: fadeInUp 0.5s ease-out 0.2s both;
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
    from { opacity: 0; transform: translateY(-16px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(16px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Flash & Validation Alerts */
.alert {
    border-radius: 8px !important;
    border: none;
}

/* Responsive */
@media (max-width: 768px) {
    .login-container { padding: 10px; }
    .login-card .card-body { padding: 2rem !important; }
    .logo-circle { width: 52px; height: 52px; }
    .logo-circle i { font-size: 1.3rem; }
}
</style>

<script>
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
                    const loginBtn = form.querySelector('.login-btn');
                    loginBtn.classList.add('loading');
                    loginBtn.disabled = true;
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

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

    const nameInput = document.querySelector('#name');
    if (nameInput) {
        setTimeout(() => nameInput.focus(), 300);
    }
});
</script>
@endsection