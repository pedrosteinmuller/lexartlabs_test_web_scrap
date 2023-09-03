<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'description',
        'category',
        'price',
        'source_website',
    ];
}
