<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendReceptionMail;
use Illuminate\Http\Request;

class SendReceptionController extends Controller
{
    public function reception($schedule, $schedule2, $schedule3) {

        $date = date_create($schedule);
        $df_schedule = date_format($date, 'Y年m月d日H時i分');

        $date = date_create($schedule2);
        $df_schedule2 = date_format($date, 'Y年m月d日H時i分');

        $date = date_create($schedule3);
        $df_schedule3 = date_format($date, 'Y年m月d日H時i分');

        Mail::send(new SendReceptionMail($df_schedule, $df_schedule2, $df_schedule3));
    }
}
