<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = "package";
    public $timestamps = false;
    public $primaryKey = 'Id';

    public function courses() {
        return $this->belongsToMany('App\Models\Course', 'course_package', 'Package_Id', 'Course_Id'); 
    }

}
