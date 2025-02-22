<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vochercode extends Model
{
    /** @use HasFactory<\Database\Factories\VochercodeFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'point',

    ];

}

