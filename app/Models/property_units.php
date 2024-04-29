<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property_units extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'property_units';
    protected $fillable = [
        'unit_id',
        'unit_name',
        'unit_type',
        'unit_cover',
        'unit_description',
        'unit_category_type',
        'unit_category_description',
        'unit_price_per_month',
        'rental_range',
        'unit_status',
        'property_id',
        'unit_size',
    ];
}
