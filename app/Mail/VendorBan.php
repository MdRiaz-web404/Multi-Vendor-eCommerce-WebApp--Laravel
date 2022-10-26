<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorBan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name="";
    protected $email='';
    protected $shop_name='';
    public function __construct($name,$email,$shop)
    {
        $this->name=$name;
        $this->email=$email;
        $this->shop_name=$shop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.vendorban',[
            'name'=>$this->name,
            'email'=>$this->email,
            'shop'=>$this->shop_name,
        ]);
    }
}
