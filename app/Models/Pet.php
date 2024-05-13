<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'title',
        'animal',
        'description',
        'found',
        'location',
        'when',
        'img'
    ];
}
