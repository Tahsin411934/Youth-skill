<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'code'];
    
    public function branchCourses()
    {
        return $this->hasMany(BranchCourse::class, 'course_code', 'code');
    }
}