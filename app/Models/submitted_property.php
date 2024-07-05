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
        'property_id',
        'cunit_no',
        'cfor',
        'ccategory_description',
        'ctype',
        'cprice',
        'csize',
        'cstatus',
    ];
}
