<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendReserveMail;
use Illuminate\Http\Request;

class MailReserveController extends Controller
{
    public function reserve() {
        // $date = date_create($schedule);
        // $df_schedule = date_format($date, 'Y年m月d日H時i分');

        Mail::send(new SendReserveMail());
    }

}
