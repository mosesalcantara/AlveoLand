<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submitted_property extends Model
{
    use HasFactory;
    protected $table = 'submitted_property';
    protected $fillable = [
        'client_id',
        'cproject',
        'cunit_no',
        'cfor',
        'cstatus'
    ];
}
