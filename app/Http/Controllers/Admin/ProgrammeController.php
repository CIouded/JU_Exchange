<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Programme;
use App\Models\Level;
use App\Models\Faculty;
use App\Models\University;
use View;
use Redirect;
use DB;

class ProgrammeController extends Controller
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

        $programmes = Programme::all();

        return View::make('admin.programme.index')
            ->with('programmes', $programmes);
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

        $level = Level::all();
        $faculty = Faculty::all();
        $university = University::all();

        return View::make('admin.programme.create')
        ->with('level', $level)
        ->with('faculty', $faculty)
        ->with('university', $university);
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
            'title' => 'required'
        ]);

        $programme = new Programme;
        $programme->title = $request->input('title');
        $programme->description = $request->input('description');
        $programme->level = $request->input('level');
        $programme->faculty = $request->input('faculty');
        $programme->university = $request->input('university');
        
        $level_id = DB::table('level')->where('level', $programme->level)->pluck('Id');
        $faculty_id = DB::table('faculty')->where('name', $programme->faculty)->pluck('Id');
        $university_id = DB::table('university')->where('name', $programme->university)->pluck('Id');

        $programme->Level_Id = $level_id[0];
        $programme->Faculty_Id = $faculty_id[0];
        $programme->University_Id = $university_id[0];
        
        $programme->save();

        return redirect('home/programme');
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

        $level = Level::all();
        $faculty = Faculty::all();
        $university = University::all();
        $programme = Programme::find($id);

        return View::make('admin.programme.edit')
        ->with('programme', $programme)
        ->with('level', $level)
        ->with('faculty', $faculty)
        ->with('university', $university);
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
            'title' => 'required'
        ]);

        $programme = Programme::find($id);
        $programme->title = $request->input('title');
        $programme->description = $request->input('description');
        $programme->level = $request->input('level');
        $programme->faculty = $request->input('faculty');
        $programme->university= $request->input('university');

        $level_id = DB::table('level')->where('level', $programme->level)->pluck('Id');
        $faculty_id = DB::table('faculty')->where('name', $programme->faculty)->pluck('Id');
        $university_id = DB::table('university')->where('name', $programme->university)->pluck('Id');

        $programme->Level_Id = $level_id[0];
        $programme->Faculty_Id = $faculty_id[0];
        $programme->University_Id = $university_id[0];

        $programme->save();

        return redirect('home/programme');
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

        Programme::destroy($id);

        return redirect('home/programme');
    }
}
