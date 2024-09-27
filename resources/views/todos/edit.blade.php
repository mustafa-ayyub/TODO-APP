@extends('layouts.app')

@section('title', 'Edit Todo')

@section('content')
<div class="container mt-5">
    <h1>Edit Todo</h1>
    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $todo->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $todo->description }}</textarea>
        </div>
        <div class="form-group form-check">
            <input type="hidden" name="completed" value="0">
            <input type="checkbox" name="completed" id="completed" class="form-check-input" value="1" {{ $todo->completed ? 'checked' : '' }}>
            <label for="completed" class="form-check-label">Completed</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
