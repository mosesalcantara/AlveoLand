<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'projects';
    protected $fillable = [
        'id',
        'project_name',
        'project_logo',
        'project_tagline',
        'project_availability',
        'project_description',
        'region',
        'province',
        'city',
        'barangay',
        'street',
    ];
}
