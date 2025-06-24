@extends('layouts.app')
@section('title', 'Tüm Görevler')

@section('content')
    <div class="container-fluid px-4 py-5"
        style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">
        {{-- Header Section --}}
        <div class="row justify-content-center mb-5">

            <div class="col-12 text-center">
                <div class="card border-0 shadow-lg"
                    style="background: rgba(255, 255, 255, 0.98); box-shadow: 0 15px 35px rgba(0,0,0,0.1), 0 5px 15px rgba(0,0,0,0.07) !important;">

                    <div class="card-body py-4">
                        <h1 class="display-4 fw-bold text-primary mb-0">
                            <i class="bi bi-clipboard-check me-3"></i>Görev Yöneticisi
                        </h1>
                        <p class="lead text-muted mt-2">Görevlerinizi organize edin ve takip edin</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Flash Messages --}}
        @include('layouts.flash_message')

        {{-- Action Buttons --}}
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-lg-10">
                <div class="card border-0 shadow-lg"
                    style="background: rgba(255, 255, 255, 0.98); box-shadow: 0 10px 30px rgba(0,0,0,0.08), 0 3px 10px rgba(0,0,0,0.05) !important;">
                    <div class="card-body py-3">
                        <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                            <div class="d-flex gap-2">
                                <span class="badge bg-primary fs-6 px-3 py-2">
                                    <i class="bi bi-list-task me-1"></i>
                                    Toplam: {{ $tasks->count() }} görev
                                </span>
                                <span class="badge bg-success fs-6 px-3 py-2">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Tamamlanan: {{ $tasks->where('task_status', true)->count() }}
                                </span>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('taskCreate') }}" class="btn btn-primary btn-lg shadow-sm">
                                    <i class="bi bi-plus-circle me-2"></i>Yeni Görev
                                </a>

                                <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-lg">
                                    <i class="bi bi-box-arrow-right me-2"></i>Çıkış
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tasks Grid --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                @if ($tasks->isEmpty())
                    <div class="card border-0 shadow-lg text-center"
                        style="background: rgba(255, 255, 255, 0.98); box-shadow: 0 20px 40px rgba(0,0,0,0.1), 0 6px 20px rgba(0,0,0,0.06) !important;">
                        <div class="card-body py-5">
                            <i class="bi bi-clipboard-x display-1 text-muted mb-3"></i>
                            <h3 class="text-muted">Henüz görev bulunmuyor</h3>
                            <p class="text-muted">İlk görevinizi ekleyerek başlayın!</p>
                            <a href="{{ route('taskCreate') }}" class="btn btn-primary btn-lg mt-3">
                                <i class="bi bi-plus-circle me-2"></i>İlk Görevi Ekle
                            </a>
                        </div>
                    </div>
                @else
                    <div class="row g-4">
                        @foreach ($tasks as $index => $task)
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="card h-100 border-0 shadow-lg task-card"
                                    style="transition: all 0.3s ease; background: rgba(255, 255, 255, 0.98); box-shadow: 0 8px 25px rgba(0,0,0,0.08), 0 3px 10px rgba(0,0,0,0.04) !important;">
                                    <div class="card-header bg-transparent border-0 pb-0">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <span class="badge {{ $task->task_status ? 'bg-success' : 'bg-warning' }} fs-6">
                                                <i
                                                    class="bi {{ $task->task_status ? 'bi-check-circle' : 'bi-clock' }} me-1"></i>
                                                {{ $task->task_status ? 'Tamamlandı' : 'Devam Ediyor' }}
                                            </span>
                                            {{-- <small class="text-muted">#{{ $task->id }}</small> --}}
                                        </div>
                                    </div>

                                    <div class="card-body pt-2">
                                        <h5 class="card-title fw-bold text-dark mb-3">
                                            {{ Str::limit($task->task_title, 50) }}
                                        </h5>
                                        <p class="card-text text-muted mb-3" style="min-height: 60px;">
                                            {{ Str::limit($task->task_content, 100) }}
                                        </p>

                                        <div class="task-details mb-3">
                                            <div class="row g-2 text-sm">
                                                <div class="col-12">
                                                    <i class="bi bi-calendar-plus text-primary me-2"></i>
                                                    <small class="text-muted">
                                                        Oluşturulma:
                                                        {{ \Carbon\Carbon::parse($task->created_at)->locale('tr')->translatedFormat('d F Y H:i') }}
                                                    </small>
                                                </div>
                                                <div class="col-12">
                                                    <i class="bi bi-calendar-event text-warning me-2"></i>
                                                    <small class="text-muted">Görev Tarihi:
                                                        {{ \Carbon\Carbon::parse($task->task_date)->format('d.m.Y') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer bg-transparent border-0 pt-0">
                                        <div class="d-flex gap-2 justify-content-center">
                                            {{-- Edit Button --}}
                                            <a href="{{ route('getTaskUpdate', $task->id) }}"
                                                class="btn btn-outline-primary btn-sm flex-fill {{ $task->task_status ? 'disabled' : '' }}"
                                                {{ $task->task_status ? 'tabindex="-1" aria-disabled="true"' : '' }}>
                                                <i class="bi bi-pencil-square me-1"></i>Düzenle
                                            </a>

                                            {{-- Complete Button --}}
                                            @if (!$task->task_status)
                                                <form method="POST" action="{{ route('statusUpdate', $task->id) }}"
                                                    class="flex-fill">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-outline-success btn-sm w-100" type="submit">
                                                        <i class="bi bi-check-square me-1"></i>Tamamla
                                                    </button>
                                                </form>
                                            @endif

                                            {{-- Delete Button --}}
                                            <form action="{{ route('taskDelete', $task->id) }}" method="POST"
                                                class="flex-fill"
                                                onsubmit="return confirm('Bu görevi silmek istediğinize emin misiniz?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                                    <i class="bi bi-trash me-1"></i>Sil
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .task-card {
            border-radius: 15px !important;
            overflow: hidden;
        }

        .task-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12), 0 8px 20px rgba(0, 0, 0, 0.08) !important;
        }

        .card {
            border-radius: 15px !important;
        }

        .btn {
            border-radius: 10px !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .badge {
            border-radius: 10px !important;
            font-weight: 500;
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
        }

        .task-details {
            background: rgba(108, 117, 125, 0.08);
            border-radius: 8px;
            padding: 12px;
            border: 1px solid rgba(108, 117, 125, 0.1);
        }

        @media (max-width: 768px) {
            .display-4 {
                font-size: 2rem !important;
            }

            .btn-lg {
                padding: 0.5rem 1rem;
                font-size: 1rem;
            }
        }

        /* Animation for new cards */
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

        .task-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .task-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .task-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .task-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .task-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .task-card:nth-child(5) {
            animation-delay: 0.5s;
        }

        .task-card:nth-child(6) {
            animation-delay: 0.6s;
        }
    </style>
@endsection
