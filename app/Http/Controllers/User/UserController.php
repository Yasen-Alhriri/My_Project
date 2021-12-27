<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::where('deleted_at', '=', '0')->latest(
            'f_name',
            'l_name',
            'gender',
            'phone'
        )->paginate(5);
        $count = 0;
        return view('users.index', compact('users', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //
    public function show($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('users.show', compact('user'));
    }

    //
    public function softDelete($id)
    {
        $user = User::find($id);
        $user->deleted_at = 1;
        $user->update();
        return redirect()->back();
    }

    //
    public function backFromSoftDelete($id)
    {

        $user = User::where('id', '=', $id)->first();
        $user->deleted_at = 0;
        $user->save();

        return redirect()->back();
    }

    public function softDeleteShow()
    {
        $users = User::where('deleted_at', '=', '1')->latest(
            'f_name',
            'l_name',
            'gender',
            'phone'
        )->paginate(4);
        $count = 0;
        return view('users.softDelete', compact('users', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
