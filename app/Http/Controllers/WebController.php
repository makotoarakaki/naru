<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use App\Category;
use App\Schedule;
use App\Contract;

class WebController extends Controller
{
    public function index(Request $request)
    {
        
        // $categories = Category::all()->sortBy('major_category_name');

        // $major_category_names = Category::pluck('major_category_name')->unique();

        if(Auth::user()) {
            //契約提携済か確認
            $user = Auth::user();
            $contract = Contract::find($user->contract_id);
            
            if(isset($contract) && $contract->status === 1) {
                return redirect()->route('contract', $user->contract_id);
            } else {
//                return view('web.index', compact('major_category_names', 'categories'));
                return view('web.index');
            }
        } else {
            return view('auth.login');
        }
    }

    public function add_schedule(Request $request) {

        // Googleカレンダーへ日程追加
        $dt1 = new Carbon($request->schedule.'+09:00');
        $dt2 = new Carbon($request->schedule2.'+09:00');
        $dt3 = new Carbon($request->schedule3.'+09:00');
        $schedules = array($dt1, $dt2, $dt3);
        foreach($schedules as $schedule) {
            if(isset($schedule)) {
                $event = new Event;
                $event->name = '予約済';
                $event->startDateTime = $schedule;
                $event->endDateTime = $schedule->addHour(2);   // 2時間後
                //$event->description = "テスト説明文\nテスト説明文\nテスト説明文";
                $event->save();    
            }
        }
        // Scheduleテーブルに情報を登録
        $schedule = new Schedule();
        // 複数使うため変数に格納する
        $sschedule = $request->input('schedule');
        $sschedule2 = $request->input('schedule2');
        $sschedule3 = $request->input('schedule3');

        $schedule->schedule = $sschedule;
        $schedule->schedule2 = $sschedule2;
        $schedule->schedule3 = $sschedule3;
        $schedule->best = $request->input('best');
        $schedule->power = $request->input('power');
        $schedule->user_id = Auth::user()->id;
        $schedule->save();

        // お客様への確認メール送信
        $send_reception = app()->make('App\Http\Controllers\SendReceptionController');
        $send_reception->reception($sschedule, $sschedule2, $sschedule3);

        // 管理者へのメール送信
        $send_reserve = app()->make('App\Http\Controllers\MailReserveController');
        $send_reserve->reserve();

        return view('web.index');
    }

    public function contract($id)
    {
        if(Auth::user()) {
            $contract = Contract::find($id);
        } else {
            return redirect()->route('login', ['contract_id' => $id]);
        }

        return view('web.contract', compact('contract'));
    }

    public function contract_comp($id)
    {
        $contract = Contract::find($id);
        $contract->status = 2;
        $contract->save();

        // 管理者へのメール送信
        $send_complete = app()->make('App\Http\Controllers\ContractEmailController');
        $send_complete->complete(Auth::user()->name);

        return view('web.show', compact('contract'));
    }
}
