<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Redis;

class MovieService
{
    public function getMovie(ApiService $apiService, $id)
    {
        $apiKey = env("MOVIE_API_KEY");
        if (!isset($id)) {
            return;
        }

        $movieId = (int)$id;

        if (Redis::get($movieId) != null && Redis::keys($movieId) == $movieId) {
            $data = json_decode(Redis::get('movies'), true);
        } else {
            $movie = Movie::where('movie_id', $movieId)->first();
            if ($movie != null) {
                $data = $movie;
            } else {
                $url = "https://api.themoviedb.org/3/movie/" . $movieId . "?api_key=".$apiKey."&language=en-US";
                $data = $apiService->getApi($url);
                $this->addMovieDB($data, $movieId);

            }

        }
        $cache = json_encode($data);
        Redis::set($movieId, $cache);
        return $data;
    }

    private function addMovieDB($item, $getId)
    {
        $movie = new Movie();
        if ($item['id'] == $getId) {
            $movie->movie_id = $item['id'];
            $movie->title = $item['title'];
            $movie->overview = $item['overview'];
            $movie->popularity = $item['popularity'];
            $movie->release_date = $item['release_date'];
            $movie->vote_average = $item['vote_average'];
            $movie->budget = $item['budget'];
            $movie->backdrop_path = $item['backdrop_path'];
            $movie->poster_path = $item['poster_path'];
            $movie->save();
        }
    }
}
