@extends('layouts.app')

@section('title', 'View Todo')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>{{ $todo->title }}</h2>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $todo->description }}</p>
            <p class="card-text"><strong>Completed:</strong> {{ $todo->completed ? 'Yes' : 'No' }}</p>
            <a href="{{ route('todos.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
