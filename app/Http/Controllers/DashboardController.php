<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Schedule $schedule)
    {
        $fromday = date("Y-m-d H:i");
        $today = date("Y-m-d H:i", strtotime("1 month"));
        // ９時間プラス
        $fm = new Carbon($fromday.'+09:00');
        $to = new Carbon($today.'+09:00');
        $schedules = Schedule::whereBetween('schedule', [$fm, $to])
                               ->orderBy('schedule', 'asc')
                               ->paginate(10);

        return view('dashboard.index', compact('schedules'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $user_name = $user->name;

        $fromday = date("Y-m-d H:i");
        $today = date("Y-m-d H:i", strtotime("1 month"));
        $schedules = Schedule::where('user_id', $id)
                               ->whereBetween('schedule', [$fromday, $today])
                               ->orderBy('schedule', 'asc')
                               ->paginate(10);

        return view('dashboard.show', compact('user_name', 'schedules'));
    }
}
