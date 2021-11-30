<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendContractMail;
use App\Mail\SendContractCompMail;

class ContractEmailController extends Controller
{
    public function send($id, $email, $name) {

        Mail::send(new SendContractMail($id, $email, $name));
    }

    public function complete($name) {

        Mail::send(new SendContractCompMail($name));
    }
}
