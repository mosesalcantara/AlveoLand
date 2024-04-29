<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inquiry extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'inquiry';
    protected $fillable = [
        'id',
        'type_of_inquiry',
        'identicality',
        'f_name',
        'l_name',
        'age',
        'email',
        'phone_num',
        'message',
        'status',

    ];
}
