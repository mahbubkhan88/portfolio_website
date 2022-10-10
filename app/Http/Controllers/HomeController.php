<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\SliderModel;
use App\ServiceModel;
use App\CourseModel;
use App\ProjectModel;
use App\ContactModel;
use App\ReviewModel;
use App\PrivacyPolicyModel;
use App\ReturnPolicyModel;
use App\TermsAndConditionModel;

// use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function Index()
    {

        // Ip Get
        $UserIP = $_SERVER['REMOTE_ADDR'];

        // Date Time
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");

        VisitorModel::insert([
            'ip_address' => $UserIP,
            'visit_time' => $timeDate
        ]);


        //User get slider data at home page
        $sliderData = json_decode(SliderModel::all());
        // dd($sliderData);


        //User get service data at home page
        $serviceData = json_decode(ServiceModel::all());

        //User get course data at home page
        $courseData = json_decode(CourseModel::orderBy('id', 'desc')->limit(6)->get());

        //User get project data at home page
        $projectData = json_decode(ProjectModel::all());

        //User get review data at home page
        $reviewData = json_decode(ReviewModel::all());


        return view('frontend/index', [
            'sliderData'  => $sliderData,
            'serviceData' => $serviceData,
            'courseData'  => $courseData,
            'projectData' => $projectData,
            'reviewData'  => $reviewData
        ]);
    }


    //Course Page
    public function AllCourse(){

        //User get course data at home page
        $courseData = json_decode(CourseModel::all());
        
        return view('frontend/all-course', [
            'courseData' => $courseData
        ]);
    }

    //Project Page
    public function AllProject(){

        //User get course data at home page
        $projectData = json_decode(ProjectModel::all());
        
        return view('frontend/all-project', [
            'projectData' => $projectData
        ]);
    }


    //Blog Page
    public function Blogs(){

        return view('frontend/blogs');

    }


    //Contact Page
    public function ContactPage(){

        return view('frontend/contact-us');

    }

    //Terms and Conditons Page
    public function TermsAndConditonsPage(){
        $termData = json_decode(TermsAndConditionModel::all());

        return view('frontend/terms-and-conditions', [
            'termData' => $termData
        ]);
    }

    //Return Policy Page
    public function ReturnPolicyPage(){
        $returnData = json_decode(ReturnPolicyModel::all());
        
        return view('frontend/return-policy', [
            'returnData' => $returnData
        ]);
    }


    //Privacy Policy Page
    public function PrivacyPolicyPage(){

        $privacyData = json_decode(PrivacyPolicyModel::all());
        return view('frontend/privacy-policy', [
            'privacyData' => $privacyData
        ]);
    }







    //Mail send/ insert from user end
    public function MailSend(Request $request)
    {
        $timezone = "Asia/Dhaka";
        date_default_timezone_set($timezone);

        $name      = $request->input('name');
        $mobile    = $request->input('mobile');
        $email     = $request->input('email');
        $message   = $request->input('message');
        $timezone  = date('Y-m-d H:i:s');

        $result = ContactModel::insert([
            'name'      => $name,
            'mobile'    => $mobile,
            'email'     => $email,
            'message'   => $message,
            "created_at" => $timezone,
            //'created_at'   => Carbon::now(),
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
