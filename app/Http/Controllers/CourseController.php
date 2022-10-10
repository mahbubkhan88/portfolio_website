<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseModel;

class CourseController extends Controller
{
    //Course index
    public function Courses()
    {
        $coursesData = json_decode(CourseModel::orderBy('id', 'desc')->get());

        return view('backend/course', ['coursesData' => $coursesData]);
    }


    //Course add
    public function courseAdd(Request $request)
    {
        $title       = $request->input('title');
        $description = $request->input('description');
        $fee         = $request->input('fee');
        $enroll      = $request->input('enroll');
        $courseclass = $request->input('courseclass');
        $link        = $request->input('link');
        $image       = $request->input('image');

        $result           = CourseModel::insert([
            'title'       => $title,
            'description' => $description,
            'fee'         => $fee,
            'enroll'      => $enroll,
            'courseclass' => $courseclass,
            'link'        => $link,
            'image'       => $image
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    //Course select ajax request
    public function getCourseData()
    {
        $result = CourseModel::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $result
        ]);
    }


    //Course details
    function getCourseDetails(Request $request)
    {
        $id     = $request->input('id');
        $result = json_encode(CourseModel::where('id', '=', $id)->get());
        return $result;
    }


    //Course update
    public function courseUpdate(Request $request)
    {
        $id          = $request->input('id');
        $title       = $request->input('title');
        $description = $request->input('description');
        $fee         = $request->input('fee');
        $enroll      = $request->input('enroll');
        $courseclass = $request->input('courseclass');
        $link        = $request->input('link');
        $image       = $request->input('image');

        $result               = CourseModel::where('id', '=', $id)->update([
            'title'       => $title,
            'description' => $description,
            'fee'         => $fee,
            'enroll'      => $enroll,
            'courseclass' => $courseclass,
            'link'        => $link,
            'image'       => $image
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    //Course delete
    public function courseDelete(Request $request)
    {
        $id     = $request->input('id');
        $result = CourseModel::where('id', '=', $id)->delete();

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
