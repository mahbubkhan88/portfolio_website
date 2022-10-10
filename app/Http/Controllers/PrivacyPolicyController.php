<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrivacyPolicyModel;

class PrivacyPolicyController extends Controller
{
    //Privacy Policy index
    public function Privacy()
    {
        $privacyData = json_decode(PrivacyPolicyModel::orderBy('id', 'desc')->get());

        return view('backend/privacy', ['privacyData' => $privacyData]);
    }


    //Privacy select ajax request
    public function getPrivacyData()
    {
        $result = PrivacyPolicyModel::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $result
        ]);
    }


    //Privacy details
    function getPrivacyDetails(Request $request)
    {
        $id     = $request->input('id');
        $result = json_encode(PrivacyPolicyModel::where('id', '=', $id)->get());
        return $result;
    }


    //Privacy update
    public function privacyUpdate(Request $request)
    {
        $id          = $request->input('id');
        $title       = $request->input('title');
        $description = $request->input('description');

        $result           = PrivacyPolicyModel::where('id', '=', $id)->update([
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
