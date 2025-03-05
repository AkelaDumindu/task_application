<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task()
    {
        return view('tasks.task');
    }


    public function add()
    {
        return view('tasks.add-new-task');
    }
}
