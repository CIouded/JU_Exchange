<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Level;
use View;
use Redirect;
use DB;

class LevelController extends Controller
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
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Staff_user', 'Programme_manager', 'Admin_user', 'Super_admin']);

        $levels = Level::all();

        return View::make('admin.level.index')
            ->with('levels', $levels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        return View::make('admin.level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        $this->validate($request, [
            'level' => 'required'
        ]);

        $level = new Level;
        $level->level = $request->input('level');
        $level->save();

        return redirect('home/level');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        $level = Level::find($id);
        return View::make('admin.level.edit')->with('level', $level);
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
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        $this->validate($request, [
            'level' => 'required'
        ]);

        $level = Level::find($id);
        $level->level = $request->input('level');
        $level->save();

        return redirect('home/level');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        Level::destroy($id);

        return redirect('home/level');
    }
}
