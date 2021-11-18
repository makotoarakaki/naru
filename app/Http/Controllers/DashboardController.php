<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Schedule $schedule)
    {
        // $user = User::find(Auth::user()->id);
        // $user_name = $user->name;

        $schedules = Schedule::all();

        //$schedules = Schedule::where('user.id', 'user_id')->get();
        return view('dashboard.index', compact('schedules'));
    }
}
