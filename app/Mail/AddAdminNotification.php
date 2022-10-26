<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name='';
    protected $email='';
    protected $password='';
    public function __construct($name, $email, $password)
    {
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.addadminnotification',[
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password
        ]);
    }
}
