<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;

class SendPasswordResetEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email,$id;

    /**
     * Create a new job instance.
     *
     * @param $email
     * @param $id
     * @return void
     *
     */
    public function __construct($email,$id)
    {
        $this->email = $email;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $to = User::where('id','=',$this->id)->get()->first();
//        Mail::to($to)->send(new ResetPassword());
    }
}
