@extends('layouts.app')

@section('title', 'Todo List')

@section('content')
<div class="container mt-5">
    @auth
        <h1 class="mb-4">Todo List</h1>
        <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Create New Todo</a>
        <ul class="list-group">
            @foreach($todos as $todo)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('todos.show', $todo->id) }}">{{ $todo->title }}</a>
                    </div>
                    <div>
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <h1>Welcome to the Todo App</h1>
        <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to manage your todos.</p>
    @endauth
</div>
@endsection
