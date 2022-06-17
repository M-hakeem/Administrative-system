<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class accountVerification extends Mailable
{
    use Queueable, SerializesModels;
    protected $fname;
    protected $lname;
    protected $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fname,$lname,$email)
    {
        //
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $url = env('APP_URL').'status/'.md5($this->email);
        $url =env('APP_URL')."/status/$this->email";
        return $this->view('Mails.User_Update')->with([
            'fn' => $this->fname,
            'ln' => $this->lname,
            'url' => $url
        ]);
    }
}