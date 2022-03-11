<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    public $timestamps = false;

    public $fillable = [
        'movie_id',
        'original_title',
        'overview',
        'popularity',
        'release_date',
        'vote_average',
    ];

}
