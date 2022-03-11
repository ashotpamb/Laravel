<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;

class ApiController extends Controller
{
    public function index()
    {
        if (isset($_POST['search'])) {
            $prefix = $_POST['search'];
            $url = "https://api.themoviedb.org/3/search/movie?api_key=15b6c53c504f98c42f7cd3f0da4bb121&language=en-US&page=1&include_adult=false&query=" . $prefix;
            $data = $this->callApi($url);
            $this->addDataToDb($data);
            return response()->json(array('data' => $data), 200);

        }
    }

    public function callApi($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result);
        return $obj;
    }

    private function addDataToDb($data)
    {
        $data = json_decode(json_encode($data), true);
        foreach ($data as $result) {
            if (is_array($result)) {
                foreach ($result as $item) {
                    $movie = new Movie();
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
