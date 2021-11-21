<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use App\Category;
use App\Schedule;

class WebController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortBy('major_category_name');

        $major_category_names = Category::pluck('major_category_name')->unique();

        if(Auth::user()) {
            return view('web.index', compact('major_category_names', 'categories'));
        } else {
            return view('home');
        }
    }

    public function add_schedule(Request $request) {

        // Googleカレンダーへ日程追加
        $dt = new Carbon($request->schedule.'+09:00');

        $event = new Event;
        $event->name = '予約済';
        $event->startDateTime = $dt;
        $event->endDateTime = $dt->addHour(2);   // 2時間後
        //$event->description = "テスト説明文\nテスト説明文\nテスト説明文";
        $event->save();

         // Scheduleテーブルに情報を登録
        $schedule = new Schedule();
        // 複数使うため変数に格納する
        $sschedule = $request->input('schedule');

        $schedule->schedule = $sschedule;
        $schedule->best = $request->input('best');
        $schedule->power = $request->input('power');
        $schedule->user_id = Auth::user()->id;
        $schedule->save();

        // お客様への確認メール送信
        $send_reception = app()->make('App\Http\Controllers\SendReceptionController');
        $send_reception->reception($sschedule);
        // 管理者へのメール送信
        $send_reserve = app()->make('App\Http\Controllers\MailReserveController');
        $send_reserve->reserve($sschedule);

        return view('web.index', compact('major_category_names', 'categories'));
    }
}
