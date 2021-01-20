<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    protected $fillable = ['subscription_name', 'price', 'currency','valid_for', 'total_job_apply'];
}
