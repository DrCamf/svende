<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutoringMaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        'tutor_id',
        'materialPath'
    ];
}
