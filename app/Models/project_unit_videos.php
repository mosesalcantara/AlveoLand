<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_unit_videos extends Model
{
    use HasFactory;
    protected $table = 'project_unit_videos';
    protected $fillabe = [
        'project_units_id',
        'project_unit_video_name',
    ];
}
