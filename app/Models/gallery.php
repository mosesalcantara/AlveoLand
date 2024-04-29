<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'gallery';
    protected $fillable = [
        'id',
        'name',
        'owner_id',
    ];
    public function images()
    {
        return $this->hasMany(gallery::class);
    }
    public function head()
    {
        return $this->belongsTo(head::class);
    }
}
