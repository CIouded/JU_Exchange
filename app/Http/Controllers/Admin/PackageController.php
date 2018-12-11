<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Course_package;
use App\Models\Course;
use App\Models\University;
use App\Models\Programme;
use View;
use Redirect;
use DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Staff_user', 'Programme_manager', 'Admin_user', 'Super_admin']);

        $packages = Package::all();
        $course_package = Course_package::all();

        return View::make('admin.package.index')
            ->with('packages', $packages)
            ->with('course_package', $course_package);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin', 'Programme_manager']);

        /*if($request->user()->programme != null) {
            $title = DB::table('programme')->where('title', '=', $request->user()->programme)->pluck('title');
            $Id = DB::table('programme')->where('title', '=', $request->user()->programme)->pluck('Id');
            $programme = array('Id' => $Id,
                               'title' => $title);
            //dd($programme);

        } else {
            $programme = Programme::all();
        }*/

        $package = Package::all();
        $course = Course::all();
        $programme = Programme::all();
        $university = University::all();
        $course_package = Course_package::orderBy('Package_title')->get();

        return View::make('admin.package.create')
            ->with('course', $course)
            ->with('package', $package)
            ->with('course_package', $course_package)
            ->with('programme', $programme)
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
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin', 'Programme_manager']);
        $this->validate($request, [
            'title' => 'required'
        ]);
        $home_university_id = $request->input('university');
        $programme_id = $request->input('programme');
        $partner_university_id = $request->input('partner_university');

        $home_university_name = DB::table('university')->where('Id', $home_university_id)->pluck('name');
        $programme_name = DB::table('programme')->where('Id', $programme_id)->pluck('title');
        $partner_university_name = DB::table('university')->where('Id', $partner_university_id)->pluck('name');

        $package = new Package;
        $package->title = $request->input('title');
        $package->description = $request->input('description');
        $package->home_university = $home_university_name[0];
        $package->match_value = $request->input('match_value');
        $package->programme = $programme_name[0];
        $package->partner_university = $partner_university_name[0];
        $package->programme_Id = $programme_id;
        $package->university_Id = $home_university_id;
        $package->pu_Id = $partner_university_id;
        $package->save();

        $package_id = DB::table('package')->where('title', $package->title)->pluck('Id');

        foreach($request->course as $key) {
            
            $course_name = DB::table('course')->where('Id', $key)->pluck('name');

            $data = array('Package_Id' => $package_id[0], 
                'Course_Id' => $key, 
                'University_Id' => $home_university_id[0], 
                'Package_title' => $package->title, 
                'Course_name' => $course_name[0], 
                'Pu_Id' => $partner_university_id);

            Course_package::insert($data);    
        }

        return redirect('home/package');
        
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
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin', 'Programme_manager']);

        $package = Package::find($id);
        $course = Course::all();
        $programme = Programme::all();
        $university = University::all();
        $pu_course = DB::table('course')->where('University_Id', '=', $package->pu_Id)->get();
        $course_package = DB::table('course_package')->where('Package_Id', '=', $id)->get();

        return View::make('admin.package.edit')
            ->with('course', $course)
            ->with('package', $package)
            ->with('course_package', $course_package)
            ->with('programme', $programme)
            ->with('university', $university)
            ->with('pu_course', $pu_course);
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
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin', 'Programme_manager']);

        $this->validate($request, [
            'title' => 'required'
        ]);
        
        $home_university_id = $request->input('university');
        $programme_id = $request->input('programme');
        $partner_university_id = $request->input('partner_university');
        
        $home_university_name = DB::table('university')->where('Id', $home_university_id)->pluck('name');
        $programme_name = DB::table('programme')->where('Id', $programme_id)->pluck('title');
        $partner_university_name = DB::table('university')->where('Id', $partner_university_id)->pluck('name');

        $package = Package::find($id);
        $package->title = $request->input('title');
        $package->description = $request->input('description');
        $package->home_university = $home_university_name[0];
        $package->match_value = $request->input('match_value');
        $package->programme = $request->input('programme');
        $package->partner_university = $partner_university_name[0];
        $package->programme_Id = $programme_id;
        $package->university_Id = $home_university_id;
        $package->pu_Id = $partner_university_id;
        $package->save();
        
        $package_id = DB::table('package')->where('title', $package->title)->pluck('Id');
        
        $course_p = $request->input('c_package');
        $index = 0;

        foreach($request->input('edit_course') as $key) {
            $course_name = DB::table('course')->where('Id', '=', $key)->pluck('name');
            
            $data = array('Package_Id' => $package_id[0], 
                'Course_Id' => $key, 
                'University_Id' => $home_university_id[0], 
                'Package_title' => $package->title, 
                'Course_name' => $course_name[0], 
                'Pu_Id' => $partner_university_id);

            DB::table('course_package')
                    ->where('Package_Id', '=', $id)
                    ->where('id', '=', $course_p[$index])
                    ->update($data);
            
            $index ++;   
        }
        
        if($request->input('course')) {
            foreach($request->input('course') as $key) {
                $course_name = DB::table('course')->where('Id', '=', $key)->pluck('name');
    
                $data = array('Package_Id' => $package_id[0], 
                    'Course_Id' => $key, 
                    'University_Id' => $home_university_id[0], 
                    'Package_title' => $package->title, 
                    'Course_name' => $course_name[0], 
                    'Pu_Id' => $partner_university_id);
    
                Course_package::insert($data);
            }
        }

        return redirect('home/package');
    }

    public function updatePackage(Request $request) {
        
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin', 'Programme_manager']);

        $this->validate($request, [
            'package' => 'required',
            'course' => 'required'
        ]);
        
        $course_package = new Course_package;
        $course_package->Package_title = $request->input('package');
        $course_package->Course_name = $request->input('course');

        $package_id = DB::table('package')->where('title', $course_package->Package_title)->pluck('Id');
        $course_id = DB::table('course')->where('name', $course_package->Course_name)->pluck('Id');

        $course_package->Package_Id = $package_id[0];
        $course_package->Course_Id = $course_id[0];

        $course_package->save();

        return redirect('home/package/'.$package_id[0].'/edit');

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
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin', 'Programme_manager']);

        Package::destroy($id);

        return redirect('home/package');
    }

    public function removeCourse(Request $request) {
        
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin', 'Programme_manager']);

        $p_id = $request->input('p_id');
        $c_id = $request->input('c_id');
        DB::table('course_package')->where('id', '=', $c_id)->delete();

        return redirect('home/package/'.$p_id.'/edit');
    }

    public function getFaculty(Request $request)
    {
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin', 'Programme_manager']);

        $university_id = $request->input('university_id');
        $faculty = Programme::where('University_Id', '=', $university_id)->get();

        return response()->json($faculty);

    }

    public function getCourse(Request $request)
    {
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin', 'Programme_manager']);

        $university_id = $request->input('university_id');
        $course = Course::where('University_Id', '=', $university_id)->get();

        return response()->json($course);

    }
}
