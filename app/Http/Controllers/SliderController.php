<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SliderModel;

class SliderController extends Controller
{
    //Slider index
    public function Sliders()
    {
        $slidersData = json_decode(SliderModel::orderBy('id', 'desc')->get());

        return view('backend/sliders', ['sliderData' => $slidersData]);
    }


    //Slider add
    public function sliderAdd(Request $request)
    {
        $title       = $request->input('title');
        $description = $request->input('description');
        $image       = $request->input('image');
        
        $result               = SliderModel::insert([
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


    //Slider select ajax request data table
    public function getSlidersData()
    {
        $result = SliderModel::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $result
        ]);
    }


    //Slider details
    function getSliderDetails(Request $request)
    {
        $id     = $request->input('id');
        $result = json_encode(SliderModel::where('id', '=', $id)->get());
        return $result;
    }


    //Slider update
    public function sliderUpdate(Request $request)
    {
        $id          = $request->input('id');
        $title       = $request->input('title');
        $description = $request->input('description');
        $image       = $request->input('image');
        
        $result               = SliderModel::where('id', '=', $id)->update([
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


    //Slider delete
    public function sliderDelete(Request $request)
    {
        $id     = $request->input('id');
        $result = SliderModel::where('id', '=', $id)->delete();

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
