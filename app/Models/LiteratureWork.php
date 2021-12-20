<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiteratureWork extends Model
{
    use HasFactory;

    protected $fillable=[
        'publishingDate',
        'promotionPlace'
    ];
}
