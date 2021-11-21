<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendReceptionMail;
use Illuminate\Http\Request;

class SendReceptionController extends Controller
{
    public function reception($schedule) {
        $date = date_create($schedule);
        $df_schedule = date_format($date, 'Y年m月d日H時i分');

        Mail::send(new SendReceptionMail($df_schedule));
    }
}
