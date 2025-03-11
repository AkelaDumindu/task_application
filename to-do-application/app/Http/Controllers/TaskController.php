<?php

namespace App\Http\Controllers;


use App\Models\Newtask;
use App\Models\Task;
use Attribute;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task(Request $request)
    {

        $today = now()->toDateString();


        $search = $request->query('search');
        $category = $request->query('category');
        $priority = $request->query('priority');
        $filterDate = $request->query('filterDate', '');
        // $todayTasksQuery = Task::whereDate('duedate', $today);

        $query = Task::query();


        // $query -> whereDate('duedate', $today);
        // $query ->   whereDate('duedate', '!=', $today);

        // if ($filterDate === "today") {
        //     $query -> whereDate('duedate', $today);
        // }

        if ($filterDate === "today") {
            $query->whereDate('duedate', $today);
        } elseif ($filterDate === "all" || empty($filterDate)) {

        }


        $otherTasksQuery = Task::whereDate('duedate', '!=', $today);

        if (!empty($category)) {
            $query->where('category', $category);
        }

        if (!empty($priority)) {
            $query->where('priority', $priority);
        }

        if (!empty($search)) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $tasks = $query->get();

        return view('tasks.task', ['tasks' => $tasks]);
    }



    public function add(Request $request)
    {

        try {
            $task = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'category' => 'required',
                'duedate' => 'required|date',
                'priority' => 'required'

            ]);

            $saveData = Task::create($task);
            return redirect(route('task'));
        } catch (\Throwable $th) {
            return $th;
        }

    }

    public function allTask()
    {
        try {
            $today = now()->toDateString();

            $tasks = Task::all();


            // $todayTasks = Task::whereDate('duedate', $today)->get();


            // $otherTasks = Task::whereDate('duedate', '!=', $today)->get();

            // return view('tasks.task', compact('todayTasks', 'otherTasks'));

            return view('tasks.task', compact('tasks'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function updateTask(Request $request, $id)
    {

        try {
            $task = Task::find($id);
            $createdTask = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'category' => 'required',
                'duedate' => 'required|date',
                'priority' => 'require'
            ]);

            $task->update($createdTask);

            return redirect(route('task'))->with('success', 'Customer updated successfully.');

        } catch (\Throwable $th) {
            throw $th;
        }



    }

    public function deleteTask(Request $request, $id)
    {

        try {
            $task = Task::find($id);

            $task->delete();

            return redirect(route('task'))->with('success', 'Customer deleted successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }



    }
}



