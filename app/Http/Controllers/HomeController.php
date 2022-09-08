<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\ServiceModel;

class HomeController extends Controller
{
    public function Index()
    {

        // Ip Get
        $UserIP = $_SERVER['REMOTE_ADDR'];

        // Date Time
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");

        VisitorModel::insert([
            'ip_address' => $UserIP,
            'visit_time' => $timeDate
        ]);



        //User get service data
        $serviceData = json_decode(ServiceModel::all());

        return view('frontend/index', ['serviceData'=>$serviceData]);
    }
}
