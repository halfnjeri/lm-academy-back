<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCourseProgress extends Model
{
    protected $fillable=[
        'user_id',
        'course_id',
        'completed_section',
        'completed_sections_ids',  
        'pending_section',
        'completed_modules',
        'completed_module_ids',
        'pending_module',
        'awarded'
    ];

    protected $casts =[
        'completed_sections_ids'=> 'array',
        'completed_module_ids'=>'array',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function course() {
        return $this->belongsTo(Course::class,'course_id');
    }
}
