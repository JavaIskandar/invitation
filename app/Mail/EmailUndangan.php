<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUndangan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('tamu.email', [
            'data' => $this->data
        ])
            ->from('iskandarjava@gmail.com', $this->data['nama_pengirim'])
            ->replyTo('iskandarjava@gmail.com', 'Iskandarjava')
            ->subject('Anda Mendapatkan Undangan '.$this->data['nama_agenda']);
    }
}
