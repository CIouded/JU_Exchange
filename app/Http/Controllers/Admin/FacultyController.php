<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\University;
use View;
use Redirect;
use DB;

class FacultyController extends Controller
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

        $faculties = Faculty::all();

        return View::make('admin.faculty.index')
            ->with('faculties', $faculties);
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

        $university = University::all();

        return View::make('admin.faculty.create')
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
            'name' => 'required'
        ]);

        $faculty = new Faculty;
        $faculty->name = $request->input('name');
        $faculty->university = $request->input('university');

        $university_id = DB::table('university')->where('name', $faculty->university)->pluck('Id');

        $faculty->University_Id = $university_id[0];

        $faculty->save();

        return redirect('home/faculty');
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

        $faculty = Faculty::find($id);
        $university = University::all();

        return View::make('admin.faculty.edit')
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
            'name' => 'required'
        ]);

        $faculty = Faculty::find($id);
        $faculty->name = $request->input('name');
        $faculty->university = $request->input('university');
        
        $university_id = DB::table('university')->where('name', $faculty->university)->pluck('Id');

        $faculty->University_Id = $university_id[0];
        
        $faculty->save();

        return redirect('home/faculty');
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

        Faculty::destroy($id);

        return redirect('home/faculty');
    }
}
