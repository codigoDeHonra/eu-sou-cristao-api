<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Test extends Mailable {

    public $link;

    use Queueable, SerializesModels;

    public function build() {
        return $this->view('my-email');
    }
}
