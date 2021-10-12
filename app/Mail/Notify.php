<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notify extends Mailable
{
    use Queueable, SerializesModels;

    public $del_to;
    public $sub;
    public $data;
    public $mFrom;
    public $adminMail;

	public function __construct($to, $sub, $data){
        $this->del_to           = $to;
        $this->sub              = $sub;
        $this->data             = $data;
        $this->mFrom            = isset($data['mFrom']) ? $data['mFrom'] : 'test@gmail.com';
    }

	public function build(){
		$mail = $this->from($this->mFrom)->view('mail.'.$this->data['template'])->to($this->del_to)->subject($this->sub)->with([ 'data' => $this->data ]);

		return $mail;
    }
}