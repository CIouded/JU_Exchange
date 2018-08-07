<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Models\Programme;
use View;
use Redirect;
use DB;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        //Uses auth middleware to check if user is logged in
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Permission only for super admin
        $request->user()->authorizeRoles('Super_admin');

        $users = User::all();

        return View::make('admin.user.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Permission only for super admin
        $request->user()->authorizeRoles('Super_admin');

        $role = Role::all();
        $programme = DB::table('programme')
        ->select('title')
        ->where('University_Id', '=', 142)
        ->get();

        return View::make('admin.user.create')
            ->with('role', $role)
            ->with('programme', $programme);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Permission only for super admin
        $request->user()->authorizeRoles('Super_admin');

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_title = $request->input('role');
        $user->programme = $request->input('programme');
        $password = $request->input('password');

        $user->password = Hash::make($password);

        //$role_input = $request->input('role');

        $role = Role::where('title', $user->role_title)->first();
        
        $user->save();

        $user->roles()->attach($role);

        return redirect('home/admin');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //Permission only for super admin
        $request->user()->authorizeRoles('Super_admin');

        $role = Role::all();
        $user = User::find($id);
        $programme = DB::table('programme')
        ->select('title')
        ->where('University_Id', '=', 142)
        ->get();

        return View::make('admin.user.edit')
            ->with('role', $role)
            ->with('user', $user)
            ->with('programme', $programme);
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
        //Permission only for super admin
        $request->user()->authorizeRoles('Super_admin');

        $this->validate($request, [
            'name' => 'required',
            'role' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_title = $request->input('role');
        $user->programme = $request->input('programme');
        $password = $request->input('password');

        $user->password = Hash::make($password);

        //$role_input = $request->input('role');

        $role = Role::where('title', $user->role_title)->first();
        
        $user->save();

        $user->roles()->attach($role);

        return redirect('home/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //Permission only for super admin
        $request->user()->authorizeRoles('Super_admin');

        User::destroy($id);

        return redirect('home/admin');
    }
}
