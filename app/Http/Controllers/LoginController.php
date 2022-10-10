<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel;

class LoginController extends Controller
{
    public function AdminIndex(){
    	return view('backend/admin');
    }


    public function onLogin(Request $request){

        $userName = $request->input('userName');
        $password = $request->input('password');
        $result = AdminModel::where('userName','=', $userName)->where('password','=', $password)->count();

        if($result == 1){
            $request->session()->put('userName',$userName);
            return 1;
        } else {
            return 0;
        }
    }


    public function onLogout(Request $request){
        $request->session()->flush();
        return redirect('/admin');
    }
}
