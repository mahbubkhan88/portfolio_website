<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;

class ContactController extends Controller
{
    //Contacts index
    public function Contacts()
    {
        $contactsData = json_decode(ContactModel::orderBy('id', 'desc')->get());

        return view('backend/contacts', ['contactsData' => $contactsData]);
    }


    //Contacts select ajax request
    public function getContactData()
    {
        $result = ContactModel::orderBy('id', 'desc')->get();

        return response()->json([
            'data' => $result
        ]);
    }


    //Contacts delete
    public function contactDelete(Request $request)
    {
        $id     = $request->input('id');
        $result = ContactModel::where('id', '=', $id)->delete();

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
