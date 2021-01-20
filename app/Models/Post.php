<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['job_title', 'job_location', 'job_description', 'min_experience', 'job_type_id', 'job_skill_id', 'user_id', 'other_requirements', 'job_url'];
}
