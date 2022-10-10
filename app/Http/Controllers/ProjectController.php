<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;

class ProjectController extends Controller
{
    //Project index
    public function Projects()
    {
        $projectsData = json_decode(ProjectModel::orderBy('id', 'desc')->get());

        return view('backend/project', ['projectsData' => $projectsData]);
    }


    //Project add
    public function projectAdd(Request $request)
    {
        $title       = $request->input('title');
        $description = $request->input('description');
        $link        = $request->input('link');
        $image       = $request->input('image');

        $result           = ProjectModel::insert([
            'title'       => $title,
            'description' => $description,
            'link'        => $link,
            'image'       => $image
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    //Project select ajax request
    public function getProjectData()
    {
        $result = ProjectModel::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $result
        ]);
    }


    //Project details
    function getProjectDetails(Request $request)
    {
        $id     = $request->input('id');
        $result = json_encode(ProjectModel::where('id', '=', $id)->get());
        return $result;
    }


    //Project update
    public function projectUpdate(Request $request)
    {
        $id          = $request->input('id');
        $title       = $request->input('title');
        $description = $request->input('description');
        $link        = $request->input('link');
        $image       = $request->input('image');

        $result           = ProjectModel::where('id', '=', $id)->update([
            'title'       => $title,
            'description' => $description,
            'link'        => $link,
            'image'       => $image
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    //Project delete
    public function projectDelete(Request $request)
    {
        $id     = $request->input('id');
        $result = ProjectModel::where('id', '=', $id)->delete();

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
