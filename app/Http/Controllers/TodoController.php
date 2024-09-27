<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = Auth::user()->todos; // Get todos for the authenticated user
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'completed' => 'boolean',
        ]);

        Auth::user()->todos()->create($request->only(['title', 'description', 'completed']));

        return redirect()->route('todos.index');
    }

    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        $this->authorize('view', $todo);
        return view('todos.show', compact('todo'));
    }

    public function edit($id)
    {
        Log::info('Edit method called');
        $todo = Todo::findOrFail($id);
        $this->authorize('update', $todo); // Ensure the user is authorized to edit this todo
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'completed' => 'boolean',
        ]);

        $todo = Todo::findOrFail($id);
        $this->authorize('update', $todo); // Ensure the user is authorized to update this todo

        $todo->update($request->only(['title', 'description', 'completed']));

        return redirect()->route('todos.index');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $this->authorize('delete', $todo); // Ensure the user is authorized to delete this todo
        $todo->delete();
        return redirect()->route('todos.index');
    }
}