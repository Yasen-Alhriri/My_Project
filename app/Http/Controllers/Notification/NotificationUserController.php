<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class NotificationUserController extends Controller
{
    //
    public function addUser()
    {
        $users = User::whereNull('deleted_at')->latest(
            'f_name',
            'l_name',
            'gender',
            'phone'
        )->paginate(4);
        $count = 0;
        return view('notification.user', compact('users', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //
    public function userAcceptance($id)
    {
        $user = User::where('id', '=', $id)->first();
        $user->deleted_at = 0;
        $user->update();
        return redirect()->back();
    }

    //
    public function userRefused($id)
    {
        $user = User::where('id', '=', $id)->first();
        $user->deleted_at = 1;
        $user->update();
        return redirect()->back();
    }
}
