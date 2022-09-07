<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

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

        return view('frontend/index');
    }
}
