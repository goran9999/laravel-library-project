<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Author;

class Book extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'pageNumber',
        'publishingHouse',
        'circulation',
        'ISBN'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function authors(){
        return $this->belongsToMany(Author::class,'literature_works');
    }

}
