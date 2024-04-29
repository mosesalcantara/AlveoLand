<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class awards extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'awards';
    protected $fillable = [
        'id',
        'awards_image',
        'awards_title',
        'awarder',
        'date',
    ];
}
