<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use View;
use Redirect;
use DB;

class CountryController extends Controller
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

        $countries = Country::all();

        return View::make('admin.country.index')
            ->with('countries', $countries);
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

        return View::make('admin.country.create');
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
            'country' => 'required'
        ]);

        $country = new Country;
        $country->country = $request->input('country');
        $country->save();

        return redirect('home/countries');
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

        $country = Country::find($id);
        return View::make('admin.country.edit')->with('country', $country);
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
            'country' => 'required'
        ]);

        $country = Country::find($id);
        $country->country = $request->input('country');
        $country->save();

        return redirect('home/countries');
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

        Country::destroy($id);

        return redirect('home/countries');
    }
}
