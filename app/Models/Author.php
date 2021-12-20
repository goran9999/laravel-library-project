<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Epoch;
use App\Models\Book;
class Author extends Model
{
    use HasFactory;

    protected $fillable=[
        'firstName',
        'lastName',
        'birthYear',
        
    ];

    public function epoch(){
        return $this->belongsTo(Epoch::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

}
