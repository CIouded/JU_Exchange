<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Programme;
use App\Models\Package;
use App\Models\Course;
use App\Models\Course_package;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\University as UniversityResource;
use App\Http\Resources\Programme as ProgrammeResource;
use App\Http\Resources\Package as PackageResource;
use App\Http\Resources\Course as CourseResource;
use App\Http\Resources\CoursePackage as Course_PackageResource;
use App\Http\Resources\Country as CountryResource;


class APIController extends Controller
{
    public function university() {
        
        $universities = University::all();

        //Return universities as JSON resource
        return UniversityResource::collection($universities);
    }

    public function programme() {
        
        $programmes = Programme::all();

        return ProgrammeResource::collection($programmes);
    }

    public function package() {
        $packages = Package::all();

        return PackageResource::collection($packages);
    }

    public function course() {
        $course = Course::all();

        return CourseResource::collection($course);
    }

    public function coursePackage() {
        $course_package = Course_package::all();

        return Course_PackageResource::collection($course_package);
    }

    public function country() {
        $country = Country::all();

        return CountryResource::collection($country);
    }
}
