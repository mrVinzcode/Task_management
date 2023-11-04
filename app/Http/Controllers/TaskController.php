<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
public function index()
{
    $tasks = Task::all();
    return response()->json(['data' => $tasks]);
}

public function show($id)
{
    $task = Task::findOrFail($id);
    return response()->json(['data' => $task]);
}

public function store(Request $request)
{
    $this->validate($request, [
        'title' => 'required',
        'completed' => 'boolean',
    ]);

    $task = Task::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'completed' => $request->input('completed', false),
    ]);

    return response()->json(['data' => $task], 201);
}

public function update(Request $request, $id)
{
    $this->validate($request, [
        'title' => 'required',
        'completed' => 'boolean',
    ]);

    $task = Task::findOrFail($id);
    $task->title = $request->input('title');
    $task->description = $request->input('description');
    $task->completed = $request->input('completed', false);
    $task->save();

    return response()->json(['data' => $task]);
}

public function destroy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();

    return response(null, 204);
}
}
