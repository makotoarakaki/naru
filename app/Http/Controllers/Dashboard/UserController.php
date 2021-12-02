<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->keyword !== null) {
            $keyword = rtrim($request->keyword);
            if (is_int($request->keyword)) {
                $keyword = (string)$keyword;
        }
        $users = User::where('name', 'like', "%{$keyword}%")
            ->orwhere('email', 'like', "%{$keyword}%")
            ->orwhere('address', 'like', "%{$keyword}%")
            ->orwhere('postal_code', 'like', "%{$keyword}%")
            ->orwhere('phone', 'like', "%{$keyword}%")
            ->orwhere('id', "{$keyword}")->paginate(15);
        } else {
            $users = User::paginate(15);
            $keyword = "";
        }
        return view('dashboard.users.index', compact('users', 'keyword'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.users.index');
    }

}
