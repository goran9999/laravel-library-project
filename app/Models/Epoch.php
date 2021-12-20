<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epoch extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'duration',
        'century'
    ];
}
