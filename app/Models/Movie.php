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
        'title',
        'overview',
        'popularity',
        'release_date',
        'vote_average',
        'budget',
        'backdrop_path',
        'poster_path'
    ];

}
