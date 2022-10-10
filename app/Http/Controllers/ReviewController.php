<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewModel;

class ReviewController extends Controller
{
    //Review index
    public function Reviews()
    {
        $reviewsData = json_decode(ReviewModel::orderBy('id', 'desc')->get());

        return view('backend/review', ['reviewsData' => $reviewsData]);
    }


    //Review add
    public function reviewAdd(Request $request)
    {
        $name        = $request->input('name');
        $description = $request->input('description');
        $image       = $request->input('image');

        $result           = ReviewModel::insert([
            'name'        => $name,
            'description' => $description,
            'image'       => $image
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    //Review select ajax request
    public function getReviewData()
    {
        $result = ReviewModel::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $result
        ]);
    }


    //Review details
    function getReviewDetails(Request $request)
    {
        $id     = $request->input('id');
        $result = json_encode(ReviewModel::where('id', '=', $id)->get());
        return $result;
    }


    //Review update
    public function reviewUpdate(Request $request)
    {
        $id          = $request->input('id');
        $name        = $request->input('name');
        $description = $request->input('description');
        $image       = $request->input('image');

        $result           = ReviewModel::where('id', '=', $id)->update([
            'name'        => $name,
            'description' => $description,
            'image'       => $image
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    //Review delete
    public function reviewDelete(Request $request)
    {
        $id     = $request->input('id');
        $result = ReviewModel::where('id', '=', $id)->delete();

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
