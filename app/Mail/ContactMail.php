<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    // public $feedback;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $client_msg;
    public $client_email;
    public $c_subject;
    public $c_name;


    public function __construct($comment, $client_email, $client_subject, $client_name)
    {
        $this->client_email = $client_email ;
        $this->client_msg = $comment ;
        $this->c_subject = $client_subject ;
        $this->c_name = $client_name ;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $c_mail = $this->client_email;
        $c_msg = $this->client_msg;
        $c_sub = $this->c_subject;
        $c_name = $this->c_name;

        return $this->view('emails.ContactMailSend',compact(["c_mail","c_msg","c_sub","c_name"]))->subject($c_sub);
    }
}
