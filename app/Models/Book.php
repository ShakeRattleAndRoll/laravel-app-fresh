<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    'title', 
    'isbn', 
    'author', 
    'genre', 
    'description', 
    'published_year', 
    'pages', 
    'price', 
    'cover_image', 
    'is_available',
    'publisher'
];
}