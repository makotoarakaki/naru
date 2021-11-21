<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReceptionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $from = config('app.from_mail'); // config.app.phpで定義した値を取得

        return $this->to($email)
                    ->from($from)
                    ->view('emails.reception')
                    ->with(['name' => $name, 'schedule' => $this->schedule])
                    ->subject('【 水江卓也 】予約を受け付けました！');
    }
}