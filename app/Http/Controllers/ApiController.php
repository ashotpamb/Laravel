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
            return response()->json(array('data' => $data), 200);

        }
    }

}
