<?php

namespace App\Http\Controllers;


use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Newtask;
use App\Models\Task;
use Attribute;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function getAllTask(Request $request)
    {
        try {
            $today = now()->toDateString();

            $category = $request->query('category');
            $priority = $request->query('priority');
            $filterDate = $request->query('filterDate', '');
            $summary = $request->query('summary');
            $query = Task::where('user_id', Auth::id());

            if ($request->filled('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }


            if ($summary === "completed") {

                $query->where('is_completed', true);
            } else {
                $query->where('is_completed', false);
            }

            if ($summary === "pending") {
                $query->whereDate('duedate', '>=', $today);
            }

            if ($summary === "overdue") {
                $query->whereDate('duedate', '<', $today)->where("is_completed", false);
            }

            if ($filterDate === "today") {
                $query->whereDate('duedate', $today);
            }

            if (!empty($category)) {
                $query->where('category', $category);
            }

            if (!empty($priority)) {
                $query->where('priority', $priority);
            }

            $query->orderBy('duedate', 'asc');

            $tasks = $query->paginate(6);

            if ($request->ajax()) {
                return view('components.task-list', compact('tasks'))->render();
            }

            return view('tasks.task', ['tasks' => $tasks])->with('message', "Tasks loaded successfully.");
        } catch (\Throwable $th) {
            return redirect()->route('task')->with('message', 'Failed to load tasks!')->with('alert-type', 'error');
        }
    }

    public function addTask(TaskRequest $request)
    {
        try {
            $task = $request->validated();

            $task['user_id'] = Auth::id();

            $saveData = Task::create($task);
            return redirect(route('task'))->with('message', 'Task added successfully!')->with('alert-type', 'success');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function updateTask(UpdateTaskRequest $request, $id)
    {
        try {
            $task = Task::find($id);
            $createdTask = $request->validated();
            $createdTask['user_id'] = Auth::id();
            $task->update($createdTask);

            return redirect(route('task'))->with('message', 'Task updated successfully!')->with('alert-type', 'success');
        } catch (\Throwable $th) {
            return redirect(route('task'))->with('message', 'Task update Error!')->with('alert-type', 'error');
        }
    }

    public function deleteTask(Request $request, $id)
    {

        try {
            $task = Task::find($id);

            $task->delete();

            return redirect(route('task'))->with('message', 'Task Created successfully!')->with('alert-type', 'success');
        } catch (\Throwable $th) {
            return redirect(route('task'))->with('message', 'Task Created has Error!')->with('alert-type', 'error');
        }
    }

    public function generateSummaryPdf()
    {
        try {
            $today = now()->toDateString();

            $completedTask = Task::where("is_completed", true)->get();
            $pendingTask = Task::where("is_completed", false)->whereDate("duedate", ">=", $today)->get();
            $overDueTask = Task::where("is_completed", false)->whereDate("duedate", "<", $today)->get();

            $data = [
                'completedTask' => $completedTask,
                'pendingTask' => $pendingTask,
                'overDueTask' => $overDueTask
            ];

            session()->flash('message', 'PDF Downloaded!');
            session()->flash('alert-type', 'success');

            $pdf = PDF::loadView('tasks.task-summary-pdf', $data);
            return $pdf->download('TaskSummary.pdf');

        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function handleTaskComplete(Request $request, $id)
    {
        try {
            $task = Task::find($id);

            $task->is_completed = !$task->is_completed;
            $task->save();

            return redirect("/")->with('message', 'Task status is changed successfully!')->with('alert-type', 'success');
        } catch (\Throwable $th) {
            return redirect("/")->with('message', 'Task status is not changed!')->with('alert-type', 'error');
        }
    }
}



