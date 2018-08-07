<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\City;
use App\Models\Country;
use View;
use Redirect;
use DB;

class UniversityController extends Controller
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

        $universities = University::all();

        return View::make('admin.universities.index')
            ->with('universities', $universities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        $city = City::all();
        $country = Country::all();

        return View::make('admin.universities.create')
        ->with('city', $city)
        ->with('country', $country);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        //Validation to make sure no empty data is submitted
        $this->validate($request, [
            'name' => 'required'
        ]);

        $university = new University;
        $university->name = $request->input('name');
        $university->phone = $request->input('phone');
        $university->accepting_nr = $request->input('accepting');
        $university->address = $request->input('address');
        $university->postal_code = $request->input('postal_code');
        $university->country = $request->input('country');
        $university->city = $request->input('city');
        
        $city_id = DB::table('city')->where('city', $university->city)->pluck('Id');
        $country_id = DB::table('country')->where('country', $university->country)->pluck('Id');

        $university->city_Id = $city_id[0];
        $university->country_Id = $country_id[0];
        
        $university->save();


        return redirect('home/universities');
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        $university = University::find($id);
        $city = City::all();
        $country = Country::all();

        return View::make('admin.universities.edit')
        ->with('university', $university)
        ->with('city', $city)
        ->with('country', $country);;
            
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
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $university = University::find($id);
        $university->name = $request->input('name');
        $university->accepting_nr = $request->input('accepting');
        $university->phone = $request->input('phone');
        $university->address = $request->input('address');
        $university->postal_code = $request->input('postal_code');
        $university->country = $request->input('country');
        $university->city = $request->input('city');

        $city_id = DB::table('city')->where('city', $university->city)->pluck('Id');
        $country_id = DB::table('country')->where('country', $university->country)->pluck('Id');

        $university->city_Id = $city_id[0];
        $university->country_Id = $country_id[0];
        
        $university->save();

        return redirect('home/universities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        University::destroy($id);
        /*$university = University::find($id);
        $university->delete();*/
        return redirect('home/universities');
    }
}
