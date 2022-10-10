<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceModel;

class ServiceController extends Controller
{
    //Servie index
    public function Services()
    {
        $servicesData = json_decode(ServiceModel::orderBy('id', 'desc')->get());

        return view('backend/services', ['serviceData' => $servicesData]);
    }


    //Servie add
    public function serviceAdd(Request $request)
    {
        $title       = $request->input('title');
        $description = $request->input('description');
        $image       = $request->input('image');
        
        $result               = ServiceModel::insert([
                'title'       => $title,
                'description' => $description,
                'image'       => $image
            ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    //Servie select ajax request
    public function getServicesData()
    {
        $result = ServiceModel::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $result
        ]);
    }


    //Servie details
    function getServiceDetails(Request $request)
    {
        $id     = $request->input('id');
        $result = json_encode(ServiceModel::where('id', '=', $id)->get());
        return $result;
    }


    //Servie update
    public function serviceUpdate(Request $request)
    {
        $id          = $request->input('id');
        $title       = $request->input('title');
        $description = $request->input('description');
        $image       = $request->input('image');
        
        $result               = ServiceModel::where('id', '=', $id)->update([
                'title'       => $title,
                'description' => $description,
                'image'       => $image
            ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    //Servie delete
    public function serviceDelete(Request $request)
    {
        $id     = $request->input('id');
        $result = ServiceModel::where('id', '=', $id)->delete();

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
    
}
