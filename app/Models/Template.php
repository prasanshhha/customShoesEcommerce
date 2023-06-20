<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
        'x',
        'y',
        'topx',
        'topy',
        'center',
        'bottomx',
        'bottomy'
    ];
}
