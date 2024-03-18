@extends('app')
@section('title')Редактировать задачу@endsection
@section('content')
    <div class="container w-50">
        <h1 class="text-center mt-5 mb-5">Редактировать задачу</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="row g-3" method="post" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3 col-md-6">
                <label for="task-name" class="form-label">Название задачи</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    id="task-name"
                    placeholder="Введите название"
                    value="{{ $task->name }}"
                    required
                >
                <div class="form-text mt-2">Длина текста минимум 5 символов, максимум 255 символов</div>
            </div>
            <div class="mb-3 col-md-12">
                <label for="task-description" class="form-label">Описание задачи</label>
                <textarea
                    type="text"
                    name="description"
                    class="form-control"
                    id="task-description"
                    rows="5"
                    placeholder="Введите описание задачи"

                    required
                >{{ $task->description }}</textarea>
                <div class="form-text mt-2">Длина текста минимум 20 символов</div>
            </div>
            <div class="col-md-2">
                <label for="task-status" class="form-label">Статус</label>
                <input
                    type="number"
                    name="status"
                    min="0"
                    max="1"
                    class="form-control"
                    id="task-status"
                    placeholder="0/1"
                    value="{{ $task->status }}"
                >
            </div>
            <div class="mb-3 col-md-12">
                <div class="form-text mt-2">0 - неактивный, 1 - активный</div>
            </div>
            <div class="mb-3 col-12">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Отмена</a>
            </div>
        </form>
    </div>
@endsection
