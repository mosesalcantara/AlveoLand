<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit_images extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'unit_images';
    protected $fillable = [
        'unit_image_id',
        'unit_image_name',
        'unit_id',
    ];
}
