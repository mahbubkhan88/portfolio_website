<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhotoModel;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    //Photo index
    public function Photos()
    {
        return view('backend/photo');
    }


    //Load photo
    public function loadPhotoJSON(Request $request)
    {
        $result =  PhotoModel::take(3)->get();
        return $result;
    }


    //Load photo
    public function loadPhotoJsonById(Request $request)
    {
        $FirstID = $request->id;
        $LastID = $FirstID + 3;
        return PhotoModel::where('id', '>=', $FirstID)->where('id', '<', $LastID)->get();
    }


    //Photo insert
    public function photoAdd(Request $request)
    {
        $photoPath = $request->file('photo')->store('public');

        $photoName = (explode('/', $photoPath))[1];

        $host = $_SERVER['HTTP_HOST'];
        $location = "http://" . $host . "/storage/" . $photoName;

        $result = PhotoModel::insert(['location' => $location]);

        return $result;
    }


    //Photo delete
    public function photoDelete(Request  $request)
    {

        $oldPhotoURL = $request->input('oldPhotoURL');
        $oldPhotoID  = $request->input('id');

        $oldPhotoURLArray = explode("/", $oldPhotoURL);
        $oldPhotoName = end($oldPhotoURLArray);
        $DeletePhotoFile = Storage::delete('public/' . $oldPhotoName);

        $DeleteRow = PhotoModel::where('id', '=', $oldPhotoID)->delete();
        return  $DeleteRow;
    }
}
