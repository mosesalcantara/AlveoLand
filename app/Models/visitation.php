<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitation extends Model
{
    use HasFactory;
    protected $table = 'visitation';
    protected $fillable = [
        'full_name',
        'contact',
        'email',
        'date',
        'time',
        'unit_id',
        'status',
    ];
}
