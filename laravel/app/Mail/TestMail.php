<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $testString;

    public function __construct(String $testString)    //mettere String forza il fatto che sia una stringa, se passo altro si rompe
    {
        $this-> testString= $testString;
    }

    public function build()
    {
        return $this->from('no-replay@laravel.com')->view('mail.testMail');
    }
}
