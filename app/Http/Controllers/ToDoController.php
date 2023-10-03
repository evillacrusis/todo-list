<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Http\Requests\ToDoRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class ToDoController extends Controller
{
    public function list(){
        return Inertia::render('ToDo', [
            'todos' => ToDo::orderBy('id', 'desc')->get()->map(fn($todo) => [
                'id' => $todo->id,
                'title' => $todo->title,
                'description' => $todo->description,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $todo->created_at)
                ->format('m/d/Y H:i:s')
            ])
        ]);
    }

    public function store(ToDoRequest $request){
        $todoData = $request->only(['title', 'description']);
        ToDo::create($todoData);

        return redirect()->route('todos')->with('success', 'ToDo created successfully.');

    }

    public function delete(ToDo $todo){
        $todo->delete();
        return redirect()->route('todos')->with('success', 'ToDo deleted successfully.');
    }
}
