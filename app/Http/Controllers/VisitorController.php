<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

class VisitorController extends Controller
{
    public function Visitors(){

        $visitorData = json_decode(VisitorModel::orderBy('id','desc')->take(500)->get()) ;

        return view('backend/visitor', ['visitorData'=>$visitorData]);

    }
}