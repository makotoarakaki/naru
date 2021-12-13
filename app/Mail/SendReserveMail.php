<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;

class SendReserveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $from = config('app.from_mail'); // config.app.phpで定義した値を取得
        $schedule = url('/dashboard/'.$id, null, true);

        return $this->to($from)
                    ->from($from)
                    ->view('emails.reserve')
                    ->with(['name' => $name, 'schedule' => $schedule])
                    ->subject('コンサル予約のお知らせです');
    }
}
