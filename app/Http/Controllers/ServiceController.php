<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceModel;

class ServiceController extends Controller
{
    public function Services(){

        return view('backend/services');

    }

    public function getServiceData(){

        $result = json_encode(ServiceModel::all());
        return $result;

    }
}
