<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutoring extends Model
{
    use HasFactory;
    protected $fillable = [
        'titel',
        'price'
    ];
}
