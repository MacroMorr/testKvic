@extends('app')
@section('title')Задачи@endsection
@section('content')
    <div class="container">
        <h1 class="text-center mt-5 mb-5">Таблица поставленных задач</h1>
        @if (session('success'))
            <p class="text-center mt-5 mb-5 text-success">{{ session('success') }}</p>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата публикации</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($tasks))
                @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{$task->id}}</th>
                        <td>{{$task->name}}</td>
                        <td>{{$task->description}}</td>
                        @if($task->status === 1)
                            <td class="text-success">Активный</td>
                        @else
                            <td class="text-danger">Неактивный</td>
                        @endif
                        <td class="col-2">{{$task->created_at}}</td>
                        <td>
                            <div class="d-inline-flex">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary mx-2"><i
                                        class="fas fa-pen"></i></a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="position-absolute">
            <a href="{{ route('tasks.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
        </div>
        <div class="col-12">
            <ul class="pagination justify-content-center">
                @if(!empty($tasks))
                    <li class="page-item">{{ $tasks->links() }}</li>
                @endif
            </ul>
        </div>

    </div>
@endsection
