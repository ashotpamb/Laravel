<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;

class ApiController extends Controller
{
    public function index()
    {
//        $data = json_decode(json_encode($data),true);
//        foreach ($data as $result) {
//            if(is_array($result)) {
//                foreach ($result as $item) {
//                    echo $item['original_title'] . "<br>";
//                }
//            }
//        }
        if (isset($_POST['search'])) {
            echo 5555;die();
            $prefix = $_POST['name'];
            $url = "https://api.themoviedb.org/3/search/movie?api_key=15b6c53c504f98c42f7cd3f0da4bb121&language=en-US&page=1&include_adult=false&query=".$prefix;
            $data = $this->callApi($url);
            echo "<pre>";
            print_r($data);
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
}
