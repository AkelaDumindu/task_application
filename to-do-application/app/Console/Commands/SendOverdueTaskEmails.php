<?php

namespace App\Console\Commands;

use App\Mail\OverdueEmail;
use App\Models\Task;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendOverdueTaskEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-overdue-task-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       $this->info("checking for overdue task");

       $overdueTask=Task::where("is_completed",false)->whereDate("dueDate", "<", now())->with("user")->get();

       foreach ($overdueTask as $key => $task) {

        if($task->user){
            Mail::to($task->user->email)->send(new OverdueEmail($task));
            $this->info("Email sent to: " . $task->user->email . " for Task ID: " . $task->id);
        }
       }
    }
}
