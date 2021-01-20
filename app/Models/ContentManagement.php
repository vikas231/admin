<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentManagement extends Model
{
    //
    protected $table = 'content_managements';
    protected $fillable = ['title', 'short_content', 'content', 'type',]; 
}
