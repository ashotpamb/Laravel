<?php

namespace App\Services;


class SearchService
{

    public function getAllMovies(ApiService $apiService)
    {
        if (isset($_POST['search'])) {
            $prefix = $_POST['search'];
            $url = "https://api.themoviedb.org/3/search/movie?api_key=15b6c53c504f98c42f7cd3f0da4bb121&language=en-US&page=1&include_adult=false&query=" . $prefix;
            $data = $apiService->getApi($url);

            $data['view'] = view('search.simple_view', [
                'movies' => $data['results'],
                'prefix' => $prefix
            ])->render();
            return $data;

        }
    }
    public function listing(ApiService $service)
    {

        if (isset($_GET['search'])) {
            $prefix = $_GET['search'];
            $url = "https://api.themoviedb.org/3/search/movie?api_key=15b6c53c504f98c42f7cd3f0da4bb121&language=en-US&page=1&include_adult=false&query=" . $prefix;
            $data = $service->getApi($url);
            if ($data == null) {
                $data = [
                    "info" => "No movie to show"
                ];
                return $data;
            }

            return $data;
        }
    }

}
