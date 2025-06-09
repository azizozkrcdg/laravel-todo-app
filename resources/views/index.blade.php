@extends('layouts.app')
@section('title', 'Tüm Görevler')

@section('content')
    <div class="col-10 mx-auto">
        <div class="text-center mt-5">
            <h1>Tüm Görevler</h1>
        </div>

        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif

        <div class="text-end mt-4">
            <a href="{{ route('taskCreate') }}" class="btn btn-success">Görev Ekle</a>
        </div>

        <div class="mt-4 border rounded-3 shadow p-4 mb-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->task_title }}</td>
                            <td>{{ $task->task_content }}</td>
                            <td>{{ $task->task_date }}</td>
                            <td><a href=""><i class="btn btn-sm btn-success bi bi-pencil-square"></i></a></td>
                            <td>
                                <form action="{{ route('taskDelete', $task->id) }}" method="POST"
                                    onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
