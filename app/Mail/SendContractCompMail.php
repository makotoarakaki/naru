<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContractCompMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = config('app.from_mail'); // config.app.phpで定義した値を取得
        $name = $this->name;
        return $this->to($from)
                    ->from($from)
                    ->view('emails.contract_comp')
                    ->with(['name' => $name])
                    ->subject('契約完了通知メール');
    }
}