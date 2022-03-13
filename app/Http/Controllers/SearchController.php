<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Services\ApiService;
use App\Services\SearchService;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class SearchController extends Controller
{
    public $data = [];

    private $searchService;
    private ApiService $apiService;

    public function __construct(SearchService $searchService, ApiService $apiService)
    {
        $this->searchService = $searchService;
        $this->apiService = $apiService;
    }

    public function movies() //movies - movie
    {

        $data = $this->searchService->getAllMovies($this->apiService);
        return response()->json($data);
    }

    public function listing(MovieRequest $request)
    {
        $result = $this->searchService->listing($this->apiService);
        return view("movies.movie_list",['data' => $result['results']]);

    }


}
