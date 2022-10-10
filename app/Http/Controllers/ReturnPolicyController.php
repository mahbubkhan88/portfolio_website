<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReturnPolicyModel;

class ReturnPolicyController extends Controller
{
    //Return Policy index
    public function Return()
    {
        $returnData = json_decode(ReturnPolicyModel::orderBy('id', 'desc')->get());

        return view('backend/return', ['returnData' => $returnData]);
    }


    //Return select ajax request
    public function getReturnData()
    {
        $result = ReturnPolicyModel::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $result
        ]);
    }


    //Return details
    function getReturnDetails(Request $request)
    {
        $id     = $request->input('id');
        $result = json_encode(ReturnPolicyModel::where('id', '=', $id)->get());
        return $result;
    }


    //Return update
    public function returnUpdate(Request $request)
    {
        $id          = $request->input('id');
        $title       = $request->input('title');
        $description = $request->input('description');

        $result           = ReturnPolicyModel::where('id', '=', $id)->update([
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
