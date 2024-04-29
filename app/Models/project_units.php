<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_units extends Model
{
    use HasFactory;
    protected $table = 'project_units';
    protected $fillabe = [
        'project_properties_id',
        'project_unit_no',
        'project_unit_banner',
        'project_unit_type',
        'project_unit_price',
        'project_unit_category_type',
        'project_unit_category_category',
        'project_unit_size',
        'project_unit_status',
    ];
}
