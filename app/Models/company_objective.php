<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_objective extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'company_objective';
    protected $fillable = [
        'id',
        'company_objective',
    ];
}
