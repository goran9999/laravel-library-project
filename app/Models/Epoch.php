<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
class Epoch extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'duration',
        'century'
    ];

    public function author(){
        return $this->hasMany(Author::class);
    }
}
