<?php

namespace App\Jobs;

use App\Mail\OverdueEmail;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;
    public $task;

    /**
     * Create a new job instance.
     */
    public function __construct($task)
    {
        $this->task->$task;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->task->user) { 
            Mail::to($this->task->user->email)->send(new OverdueEmail($this->task));
        }
    }
}
