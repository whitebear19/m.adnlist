<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminSend extends Mailable
{
    use Queueable, SerializesModels;
    public $feedback;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {      
        if($this->feedback['task_status'] == "5")
        { 
            return $this->subject("Post Expired!")->view('email.adminsend');  
        }   
        elseif($this->feedback["task_status"] == "4")
        {
            return $this->subject("Your Post flagged!")->view('email.adminsend');  
        }   
        elseif($this->feedback["task_status"] == "3")
        {
            return $this->subject("Your Post deleted!")->view('email.adminsend');  
        }      
        elseif($this->feedback["task_status"] == "2")
        {
            return $this->subject("Your post is blocked!")->view('email.adminsend');  
        }     
        elseif($this->feedback["task_status"] == "1")
        {
            return $this->subject("Post approved!")->view('email.adminsend');  
        }   
        else
        {
            return $this->subject("Update on your post!")->view('email.adminsend');  
        }
    }
}
