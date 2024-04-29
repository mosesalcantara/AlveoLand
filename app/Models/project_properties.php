<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_properties extends Model
{
    use HasFactory;

    protected $table = 'project_properties';
    protected $fillabe = [
        'project_logo',
        'project_banner',
        'project_name',
        'project_tagline',
        'province',
        'city',
        'barangay',
        'street',
        'status',
    ];
}
