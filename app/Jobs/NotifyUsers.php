<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $del_to;
    public $sub;
    public $data;
    public $mFrom;
    public $adminMail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to, $sub, $data)
    {
        $this->del_to           = $to;
        $this->sub              = $sub;
        $this->data             = $data;
        $this->mFrom            = isset($data['mFrom']) ? $data['mFrom'] : 'test@gmail.com';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		Mail::send(new SendMail($this->del_to, $this->sub, $this->data));
    }
}
