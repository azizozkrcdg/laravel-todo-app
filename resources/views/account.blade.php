@extends('layouts.app')
@section('title', 'Görev Ekle')

@section('content')
    <div class="container-fluid px-4 py-5"
        style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">



        {{-- Main Form Section --}}
        <div class="row justify-content-center">
            {{-- Header Section --}}
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-6 text-center">
                <div class="card border-0 shadow-lg header-card"
                    style="background: rgba(255, 255, 255, 0.98); box-shadow: 0 15px 35px rgba(0,0,0,0.1), 0 5px 15px rgba(0,0,0,0.07) !important;">
                    <div class="card-body py-4">
                        <h1 class="display-5 fw-bold text-primary mb-0">
                           <i class="bi bi-person-circle me-2"></i>Hesap Bilgileri
                        </h1>

                    </div>
                </div>
            </div>
        </div>
            <div class="col-12 col-lg-8 col-xl-6">
            <div class="card border-0 shadow-lg form-card"
            style="background: rgba(255, 255, 255, 0.98); box-shadow: 0 20px 40px rgba(0,0,0,0.1), 0 6px 20px rgba(0,0,0,0.06) !important;">
            <div class="card-body p-5">

            <form method="POST" action="#" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="mb-4">
                <label for="name" class="form-label">Ad Soyad</label>
                <input type="text" class="form-control custom-input @error('name') is-invalid @enderror"
                id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @else
                <div class="invalid-feedback">Ad soyad zorunludur.</div>
                @enderror
                </div>
                <div class="mb-4">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" class="form-control custom-input @error('email') is-invalid @enderror"
                id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @else
                <div class="invalid-feedback">Geçerli bir e-posta giriniz.</div>
                @enderror
                </div>
                <div class="mb-4">
                <label for="password" class="form-label">Yeni Şifre <span class="text-muted">(İsteğe bağlı)</span></label>
                <input type="password" class="form-control custom-input @error('password') is-invalid @enderror"
                id="password" name="password" autocomplete="new-password" placeholder="Yeni şifre girin">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @else
                <div class="invalid-feedback">Şifre en az 8 karakter olmalı.</div>
                @enderror
                </div>
                <div class="mb-4">
                <label for="password_confirmation" class="form-label">Yeni Şifre Tekrarı</label>
                <input type="password" class="form-control custom-input"
                id="password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="Yeni şifreyi tekrar girin">
                </div>
                <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-primary submit-btn px-4">
                <i class="bi bi-save me-2"></i>Güncelle
                </button>
                <a href="{{route("getTask")}}" class="btn btn-danger btn-lg ms-3 px-4">
                    <i class="bi bi-x-circle me-2"></i>İptal
                </a>
                </div>
            </form>
            @if (session('status'))
                <div class="alert alert-success custom-alert mt-4">
                {{ session('status') }}
                </div>
            @endif
            </div>
            </div>
            </div>
        </div>

        {{-- Tips Section --}}
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-8 col-xl-6">
                <div class="card border-0 shadow-sm tips-card"
                    style="background: rgba(255, 255, 255, 0.9); box-shadow: 0 5px 15px rgba(0,0,0,0.05) !important;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-muted mb-3">
                            <i class="bi bi-lightbulb text-warning me-2"></i>İpuçları
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    <small class="text-muted">Bilgilerinizi unutmayın</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    <small class="text-muted">Güçlü şifre kullanın</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    <small class="text-muted">Doğru bir mail adresi girin</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Card Animations */
        .header-card {
            border-radius: 20px !important;
            animation: fadeInDown 0.8s ease-out;
        }

        .form-card {
            border-radius: 20px !important;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        .tips-card {
            border-radius: 15px !important;
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        /* Form Styling */
        .custom-input,
        .custom-textarea {
            border-radius: 12px !important;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
            padding: 12px 16px;
        }

        .custom-input:focus,
        .custom-textarea:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
            transform: translateY(-2px);
        }

        .custom-textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Button Styling */
        .btn {
            border-radius: 12px !important;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .submit-btn {
            background: linear-gradient(45deg, #0d6efd, #0056b3);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            background: linear-gradient(45deg, #0056b3, #004085);
            box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Form Label Styling */
        .form-label {
            color: #495057;
            margin-bottom: 8px;
        }

        .form-floating-custom {
            position: relative;
        }

        /* Alert Styling */
        .custom-alert {
            border-radius: 12px !important;
            border: none;
            animation: slideInDown 0.5s ease-out;
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
            .display-5 {
                font-size: 2rem !important;
            }

            .card-body {
                padding: 2rem !important;
            }

            .btn-lg {
                padding: 0.75rem 1.5rem;
                font-size: 1rem;
            }
        }

        /* Loading State for Submit Button */
        .submit-btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .submit-btn.loading::after {
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
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Focus States */
        .custom-input:focus+.form-label,
        .custom-textarea:focus+.form-label {
            color: #0d6efd;
        }

        /* Invalid States */
        .custom-input.is-invalid,
        .custom-textarea.is-invalid {
            border-color: #dc3545;
        }

        .custom-input.is-valid,
        .custom-textarea.is-valid {
            border-color: #198754;
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
                            // Add loading state to submit button
                            const submitBtn = form.querySelector('.submit-btn');
                            submitBtn.classList.add('loading');
                            submitBtn.innerHTML =
                                '<span class="spinner-border spinner-border-sm me-2"></span>Kaydediliyor...';
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Auto-focus first input
        document.addEventListener('DOMContentLoaded', function() {
            const firstInput = document.querySelector('input[name="task_title"]');
            if (firstInput) {
                setTimeout(() => firstInput.focus(), 500);
            }
        });
    </script>
@endsection
