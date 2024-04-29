<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_snapshots extends Model
{
    use HasFactory;
    protected $table = 'project_snapshots';
    protected $fillabe = [
        'project_properties_id',
        'project_snapshot_name',
    ];
}
