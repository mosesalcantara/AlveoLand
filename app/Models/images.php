<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'images';
    protected $fillable = [
        'image_id',
        'gallery_id',
        'image_name',
        'status',
    ];
    public function head()
    {
        return $this->belongsTo(head::class);
    }
    public function gallery()
    {
        return $this->belongsTo(head::class);
    }
}
