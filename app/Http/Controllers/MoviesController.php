<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Services\ApiService;
use App\Services\MovieService;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class MoviesController extends Controller
{
    private ApiService $apiService;
    private MovieService $movieService;

    public function __construct(ApiService $apiService, MovieService $movieService)
    {

        $this->apiService = $apiService;
        $this->movieService = $movieService;
    }

    public function show($id = null)
    {
//        $id = (int) $id;
        $data = $this->movieService->getMovie($this->apiService, $id);
        return view('movies.movie', ['result' => $data]);

    }
}
