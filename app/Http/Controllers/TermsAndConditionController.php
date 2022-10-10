<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TermsAndConditionModel;

class TermsAndConditionController extends Controller
{
    //Term Policy index
    public function Term()
    {
        $termData = json_decode(TermsAndConditionModel::orderBy('id', 'desc')->get());

        return view('backend/term', ['termData' => $termData]);
    }


    //Term select ajax request
    public function getTermData()
    {
        $result = TermsAndConditionModel::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $result
        ]);
    }


    //Term details
    function getTermDetails(Request $request)
    {
        $id     = $request->input('id');
        $result = json_encode(TermsAndConditionModel::where('id', '=', $id)->get());
        return $result;
    }


    //Term update
    public function termUpdate(Request $request)
    {
        $id          = $request->input('id');
        $title       = $request->input('title');
        $description = $request->input('description');

        $result           = TermsAndConditionModel::where('id', '=', $id)->update([
            'title'       => $title,
            'description' => $description
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
