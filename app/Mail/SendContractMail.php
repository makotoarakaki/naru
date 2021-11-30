<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContractMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $email, $name)
    {
        $this->id = $id;
        $this->email = $email;
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
        $register = url('/register?contract_id='.$this->id, null, true);
        $url = url('/contract/'.$this->id, null, true);
        $email = $this->email;
        $name = $this->name;
        return $this->to($email)
                    ->from($from)
                    ->view('emails.contract')
                    ->with(['name' => $name, 'url' => $url, 'register' => $register])
                    ->subject('【 水江卓也 】契約書類の確認依頼');
    }
}