<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchCourse extends Model
{
    protected $table = 'branch_course';
    protected $fillable = ['branch_code', 'course_code'];
    
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_code', 'code');
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code', 'id');
    }
}
