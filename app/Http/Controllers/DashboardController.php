<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Schedule $schedule)
    {
        $fromday = date("Y-m-d H:i");
        $today = date("Y-m-d H:i", strtotime("1 month"));
        $schedules = Schedule::whereBetween('schedule', [$fromday, $today])
                               ->orderBy('schedule', 'asc')
                               ->paginate(10);

        return view('dashboard.index', compact('schedules'));
    }
}
