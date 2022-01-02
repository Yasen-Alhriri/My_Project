<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{

    use RegistersUsers;
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profile()
    {

        $admin = Auth::user();
        // dd($admin);
        return view('admin.profile',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $admin = User::all();
       return view('auth.register', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $admin = new User;
        $admin->F_name = $request->input('f_name');
        $admin->L_name = $request->input('l_name');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password');
        $admin->phone = $request->input('phone');
        $admin->name = $request->input('name');
        $admin->role = $request->input('role');


        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('image/admin/', $filename);
            $admin->image = $filename;
        }

        $admin->save();
        return redirect()->route('profile');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $admins = User::where('deleted_at', '=', '0' )->latest(
            'F_name',
            'L_name',
             'name',
            'email',
            'image',
            'phone',
            'role',

        )->paginate(10);
        $count = 0;

        return view('admin.show', compact('admins', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);



    //     $admins = User::all();
    //     $count = 0;
    //  return view('admin.show', compact('admins','count'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::where('id', '=', $id)->first();
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = User::where('id', '=', $id)->first();
        $admin->F_name = $request->input('f_name');
        $admin->L_name = $request->input('l_name');
        $admin->email = $request->input('email');
       // $admin->password = $request->input('password');
        $admin->phone = $request->input('phone');
        $admin->name = $request->input('name');


        if ($request->hasFile('image')) {


            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('image/admin/', $filename);
            $admin->image = $filename;
        }

        $admin->update();
        return redirect()->route('profile');

    }
    public function softDelete($id)
    {
        $admin = User::find($id);
        $admin->deleted_at = 1;
        $admin->update();
        return redirect()->back();
    }

    public function backFromSoftDelete($id)
    {

        $admin = User::where('id', '=', $id)->first();
        $admin->deleted_at = 0;
        $admin->save();

        return redirect()->back();
    }
    public function softDeleteShow()
    {
        $admins = User::where('deleted_at', '=', '1')->latest(
            'F_name',
            'L_name',
             'name',
            'email',
            'image',
            'phone',
            'role'
              )->paginate(4);
        $count = 0;
        return view('admin.softDelete', compact('admins', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::where('id', '=', $id)->first();
        $admin->delete();
        return redirect()->back();
    }

}
