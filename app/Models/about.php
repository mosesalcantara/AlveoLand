<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'about';
    protected $fillable = [
        'id',
        'description',
        'role',
    ];
}
