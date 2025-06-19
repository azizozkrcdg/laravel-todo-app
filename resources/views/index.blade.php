@extends('layouts.app')
@section('title', 'Tüm Görevler')

@section('content')
<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold">📋 Tüm Görevler</h1>
    </div>

    {{-- Bildirim --}}
    @if (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
        </div>
    @endif

    @if (session("success"))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
        </div>
    @endif

    {{-- Görev Ekle Butonu --}}
    <div class="text-end mb-3">
        <a href="{{ route('taskCreate') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Görev Ekle
        </a>
    </div>

    {{-- Görevler Tablosu --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">İçerik</th>
                            <th scope="col">Oluşturulma Tarihi</th>
                            <th scope="col">Görev Tarihi</th>
                            <th scope="col">Durum</th>
                            <th scope="col" class="text-center">Düzenle</th>
                            <th scope="col" class="text-center">Sil</th>
                            <th scope="col" class="text-center">Tamamlandı</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($tasks as $task)

                            <tr>
                                <th scope="row">{{ $task->id }}</th>
                                <td>{{ $task->task_title }}</td>
                                <td>{{ $task->task_content }}</td>
                                <td>{{ $task->created_at }}</td>
                                <td>{{ $task->task_date }}</td>
                                <td><a class="{{$task->task_status ? 'btn btn-success' : 'btn btn-primary'}}">{{$task->task_status ? "Tamamlandı" : "Devam ediyor..."}}</a></td>
                                <td class="text-center">
                                    <a href="{{ route('getTaskUpdate', $task->id) }}" class="btn btn-sm btn-outline-success {{$task->task_status ? 'disabled' : ''}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('taskDelete', $task->id) }}" method="POST"
                                        onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{route("statusUpdate", $task->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-outline-success" type="submit">
                                            <i class="bi bi-check-square"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($tasks->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center text-muted">Henüz bir görev eklenmemiş.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
