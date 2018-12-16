<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;

class GeocodeSearch extends Controller
{
    public function index(){

    }

    public function action(Request $request){

        if ($request->ajax()){
            $query = $request->get('query');
            $data = null;
            if($query != ''){
                $data = $this->getCoordinate($query);
            }

            echo json_encode($data);
        }
    }

    public function getCoordinate($query){
        $query = str_replace(' ', '+', $query);
        $query = json_decode(file_get_contents(Helper::get_geocode($query)),true)[0];
        return $query;
    }
}
