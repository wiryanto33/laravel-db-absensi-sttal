<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prajurit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'pangkat',
        'korps',
        'nrp',
        'role',
        'phone',
        'jabatan',
        'satuan',
        'face_embedding',
        'image_url'
    ];
}
