<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $dataToShow = [];
        if (isset($_GET['id'])) {
            $movieId = $_GET['id'];
            $movie = Movie::where('movie_id', $movieId)->first();
             if ($movie != null) {
                    $dataToShow[] =
                        [
                            "title" => $movie['original_title'],
                            'overview' => $movie['overview'],
                            'popularity' => $movie['popularity'],
                            'vote_average' => $movie['vote_average'],
                            "check" => "I am from database"

                        ];
            } else {
                 $prefix = $_GET['prefix'];
                 $url = "https://api.themoviedb.org/3/search/movie?api_key=15b6c53c504f98c42f7cd3f0da4bb121&language=en-US&page=1&include_adult=false&query=" . $prefix;
                 $data = $this->callApi($url);
                 $this->addDataToDb($data, $movieId);
                 $data = json_decode(json_encode($data), true);
                 foreach ($data as $result) {
                     if (is_array($result)) {
                         foreach ($result as $item) {
                             if ($item['id'] == $movieId) {
                                 $dataToShow[] =
                                     [
                                         "title" => $item['original_title'],
                                         'overview' => $item['overview'],
                                         'popularity' => $item['popularity'],
                                         'vote_average' => $item['vote_average']

                                     ];
                             }
                         }
                     }
                 }
             }

            return view('info', ['data' => $dataToShow]);
        }
    }

    private function addDataToDb($data, $getId)
    {
        $movie = new Movie();
        $data = json_decode(json_encode($data), true);
        foreach ($data as $result) {
            if (is_array($result)) {
                foreach ($result as $item) {
                    if($item['id'] == $getId) {
                        $movie->movie_id = $item['id'];
                        $movie->original_title = $item['original_title'];
                        $movie->overview = $item['overview'];
                        $movie->popularity = $item['popularity'];
                        $movie->release_date = $item['release_date'];
                        $movie->vote_average = $item['vote_average'];
                        $movie->save();
                    }
                }
            }
        }
    }
}
