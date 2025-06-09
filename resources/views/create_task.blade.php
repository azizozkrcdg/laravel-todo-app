@extends('layouts.app')
@section('title', 'Görev Ekle')

<div class="container mt-5">
    <div class="col-8 mx-auto border rounded shadow p-4 bg-white">
        <h4 class="mb-4">Yeni Görev Ekle</h4>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{route("taskAdd")}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Başlık</label>
                <input type="text" name="task_title" class="form-control" placeholder="Görev başlığı" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Açıklama</label>
                <input name="task_content" rows="3" class="form-control" placeholder="Görev tanımı"></input>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Tarih</label>
                <input name="task_date" rows="3" class="form-control" placeholder="Görev tarihi örn: 06-Apr-2012"></input>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Ekle
                </button>
                <a href="{{route("getTask")}}" class="btn btn-danger">
                    <i class="bi bi-x-circle"> Geri</i>
                </a>
            </div>
        </form>
    </div>
</div>
