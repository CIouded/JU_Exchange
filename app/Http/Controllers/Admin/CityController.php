<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use View;
use Redirect;
use DB;

class CityController extends Controller
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

        $cities = City::all();

        return View::make('admin.city.index')
            ->with('cities', $cities);
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

        $country = Country::all();

        return View::make('admin.city.create')
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
        //Array of user roles with persmission to this method
        $request->user()->authorizeRoles(['Admin_user', 'Super_admin']);

        $this->validate($request, [
            'city' => 'required',
            'country' => 'required'
        ]);

        $city = new City;
        $city->city = $request->input('city');
        $city->country = $request->input('country');
        
        $country_id = DB::table('country')->where('country', $city->country)->pluck('Id');

        $city->Country_Id = $country_id[0];
        
        $city->save();

        return redirect('home/city');
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

        $country = Country::all();
        $city = City::find($id);
        
        return View::make('admin.city.edit')
                ->with('city', $city)
                ->with('country', $country);
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
            'city' => 'required'
        ]);

        $city = City::find($id);
        $city->city = $request->input('city');
        $city->country = $request->input('country');
        
        $country_id = DB::table('country')->where('country', $city->country)->pluck('Id');

        $city->Country_Id = $country_id[0];
        
        $city->save();

        return redirect('home/city');
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

        City::destroy($id);

        return redirect('home/city');
    }
}
