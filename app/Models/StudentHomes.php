<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHomes extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'city',
        'state',
        'zip',
        'description',
        'image',
    ];
}
