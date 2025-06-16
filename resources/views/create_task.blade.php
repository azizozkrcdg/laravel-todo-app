@extends('layouts.app')
@section('title', 'Görev Ekle')

@section('content')
    <div class="container my-5">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 bg-white">
                    {{-- Başlık ve Navigasyon --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0 fw-bold">📝 Yeni Görev Ekle</h4>
                        <a href="{{ route('getTask') }}" class="btn btn-outline-primary">
                            <i class="bi bi-list-ul me-1"></i> Tüm Görevler
                        </a>
                    </div>

                    {{-- Başarılı Mesaj --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
                        </div>
                    @endif

                    @php
                        $today = \Carbon\Carbon::now()->format('Y-m-d');
                    @endphp


                    {{-- Form --}}
                    <form action="{{ route('taskAdd') }}" method="POST">
                        @csrf

                        {{-- Başlık --}}
                        <div class="mb-3">
                            <label for="task_title" class="form-label">Başlık</label>
                            <input type="text" name="task_title" class="form-control" placeholder="Görev başlığı giriniz"
                                required>
                        </div>

                        {{-- Açıklama --}}
                        <div class="mb-3">
                            <label for="task_content" class="form-label">Açıklama</label>
                            <textarea name="task_content" rows="3" class="form-control" placeholder="Görev açıklamasını yazınız"></textarea>
                        </div>

                        {{-- Tarih --}}
                        <div class="mb-4">
                            <label for="task_date" class="form-label">Tarih</label>
                            <input type="date" name="task_date" class="form-control" min="{{ $today }}" required>
                        </div>

                        {{-- Butonlar --}}
                        <div class="text-end">
                            <button type="submit" class="btn btn-success me-2">
                                <i class="bi bi-plus-circle me-1"></i> Ekle
                            </button>
                            <a href="{{ route('getTask') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle me-1"></i> İptal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
