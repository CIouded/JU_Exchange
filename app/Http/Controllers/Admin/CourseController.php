<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Programme;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Level;
use View;
use Redirect;
use DB;

class CourseController extends Controller
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

        $courses = Course::all();

        return View::make('admin.course.index')
            ->with('courses', $courses);
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

        $programme = Programme::all();
        $university = University::all();
        $level = Level::all();
        $faculty = Faculty::all();

        return View::make('admin.course.create')
        ->with('programme', $programme)
        ->with('university', $university)
        ->with('level', $level)
        ->with('faculty', $faculty);
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

        $course = new Course;
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->credits = $request->input('credits');
        $course->programme = $request->input('programme');
        $course->university = $request->input('university');
        $course->level = $request->input('level');
        $course->faculty = $request->input('faculty');
        
        $programme_id = DB::table('programme')->where('title', $course->programme)->pluck('Id');
        $university_id = DB::table('university')->where('name', $course->university)->pluck('Id');
        $faculty_id = DB::table('faculty')->where('name', $course->faculty)->pluck('Id');
        $level_id = DB::table('level')->where('level', $course->level)->pluck('Id');

        $course->Programme_Id = $programme_id[0];
        $course->University_Id = $university_id[0];
        $course->Faculty_Id = $faculty_id[0];
        $course->Level_Id = $level_id[0];
        
        $course->save();

        return redirect('home/course');
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

        $course = Course::find($id);
        $programme = Programme::all();
        $university = University::all();
        $level = Level::all();
        $faculty = Faculty::all();

        return View::make('admin.course.edit')
        ->with('course', $course)        
        ->with('programme', $programme)
        ->with('university', $university)
        ->with('level', $level)
        ->with('faculty', $faculty);
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

        $course = Course::find($id);
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->credits = $request->input('credits');
        $course->university = $request->input('university');
        $course->programme = $request->input('programme');
        $course->level = $request->input('level');
        $course->faculty = $request->input('faculty');
        
        $programme_id = DB::table('programme')->where('title', $course->programme)->pluck('Id');
        $university_id = DB::table('university')->where('name', $course->university)->pluck('Id');
        $faculty_id = DB::table('faculty')->where('name', $course->faculty)->pluck('Id');
        $level_id = DB::table('level')->where('level', $course->level)->pluck('Id');

        $course->Programme_Id = $programme_id[0];
        $course->University_Id = $university_id[0];
        $course->Faculty_Id = $faculty_id[0];
        $course->Level_Id = $level_id[0];
        
        $course->save();

        return redirect('home/course');
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

        Course::destroy($id);

        return redirect('home/course');
    }
}
