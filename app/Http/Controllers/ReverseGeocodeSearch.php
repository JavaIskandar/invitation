<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;

class ReverseGeocodeSearch extends Controller
{
    public function index()
    {

    }

    public function action(Request $request)
    {
//        $lat = $request->get('lat');
//        $lng = $request->get('lng');
//        $data = null;
//        $data = $this->getDetail($lat, $lng);
//        dd( simplexml_load_file($data)->island);

//        $lat = $request->get('lat');
//        $lng = $request->get('lng');
//        $data = null;
//        $data = $this->getDetail($lat, $lng);
//        dd(json_encode($data));
////
//        $query = 'lidah wetan';
//        $data = null;
//        if($query != ''){
//            $data = $this->getCoordinate($query);
//        }
//        dd(json_encode($data['display_name']));

        if ($request->ajax()) {

            $lat = $request->get('lat');
            $lng = $request->get('lng');
            $data = null;
            $data = $this->getDetail($lat, $lng);

            echo json_encode($data['display_name']);
//        if ($request->ajax()){
//            $data['display_name'] = 'java';
//            echo json_encode($data);
//            $lat = $request->get('lat');
//            $lng = $request->get('lng');
//            $data = null;
//            if($lat != '' && $lng != ''){
//                $data = $this->getDetail($lat, $lng);
//            }
//            echo json_encode($data);
        }
    }

    public function getDetail($lat, $lng)
    {
        $query = json_decode(file_get_contents(Helper::get_reverse_geocode($lat, $lng)), true);
        return $query;
    }

    public function getCoordinate($query)
    {
        $query = str_replace(' ', '+', $query);
        $query = json_decode(file_get_contents(Helper::get_geocode($query)), true)[0];
        return $query;
    }
}
