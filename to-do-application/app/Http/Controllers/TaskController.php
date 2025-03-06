<?php

namespace App\Http\Controllers;


use App\Models\Newtask;
use App\Models\Task;
use Attribute;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task()
    {
        return view('tasks.task');
    }


    public function add(Request $request)
    {
        $task = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'priority' => 'required',

        ]);

        $saveData = Task::create($task);
        return redirect(route('task'));
    }

    public function allTask()
    {
        $tasks = Task::all();
        return view('tasks.task', compact('tasks'));

    }

    public function updateTask(Request $request, $id)
    {
        $task = Task::find($id);
        $createdTask = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'priority' => 'required',
        ]);

        $task->update($createdTask);

        return redirect(route('task'))->with('success', 'Customer updated successfully.');



    }

    public function deleteTask(Request $request, $id)
    {

        $task = Task::find($id);

        $task->delete();

        return redirect(route('task'))->with('success', 'Customer deleted successfully.');

    }
}
