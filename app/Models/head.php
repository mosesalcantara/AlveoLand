<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class head extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'head';
    protected $fillable = [
        'id',
        'name',
        'role',
        'status',
    ];
    public function images()
    {
        return $this->hasMany(images::class);
    }

    public function gallery()
    {
        return $this->hasMany(gallery::class);
    }
}
