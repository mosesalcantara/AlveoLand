<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submitted_property_images extends Model
{
    use HasFactory;
    protected $table = 'submitted_property_images';
    protected $fillable = [
        'submitted_property_id',
        'image_name',
    ];
}
