<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_videos extends Model
{
    use HasFactory;
    protected $table = 'project_videos';
    protected $fillabe = [
        'project_properties_id',
        'project_video_name',
    ];
}
