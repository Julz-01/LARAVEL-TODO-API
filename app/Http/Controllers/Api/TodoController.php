<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Http\Helpers\TodoHelper;

class TodoController extends Controller
{
    public function getTodos()
    {
        $todos = Todo::where('status', 'Pending')
            ->latest()->get();

        return response()->json(['data' => $todos], 200);
    }

    public function getTodosDone()
    {
        $todos = Todo::where('status', 'Done')
            ->latest()->get();

        return response()->json(['data' => $todos], 200);
    }

    public function createTodo(TodoRequest $request)
    {
        $todo = Todo::create([
            'name' => $request->name,
        ]);

        return response()->json(['msg' => $todo->name . ' is created!'], 201);
    }

    public function getTodo($id)
    {
        $todo = Todo::find($id);

        return response()->json(['data' => $todo], 200);
    }

    public function setDone($id)
    {
        $todo = TodoHelper::setDone($id);

        return response()->json(['msg' => $todo->name . ' set as done!'], 200);
    }

    public function deleteTodo($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return response()->json(['msg' => $todo->name . ' is deleted!'], 200);
    }
}
