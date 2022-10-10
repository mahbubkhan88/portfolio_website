<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SliderModel;
use App\VisitorModel;
use App\ServiceModel;
use App\CourseModel;
use App\ProjectModel;
use App\ReviewModel;
use App\ContactModel;
use App\PhotoModel;
use App\PrivacyPolicyModel;
use App\ReturnPolicyModel;
use App\TermsAndConditionModel;

class DashboardController extends Controller
{
    public function Dashboard(){

        $totalSlider   = SliderModel::count();
        $totalVisitor  = VisitorModel::count();
        $totalService  = ServiceModel::count();
        $totalCourse   = CourseModel::count();
        $totalProject  = ProjectModel::count();
        $totalReview   = ReviewModel::count();
        $totalContact  = ContactModel::count();
        $totalPhoto    = PhotoModel::count();
        $totalPrivacy  = PrivacyPolicyModel::count();
        $totalReturn   = ReturnPolicyModel::count();
        $totalTerms    = TermsAndConditionModel::count();

        return view('backend/dashboard', [
            'totalSlider'  => $totalSlider,
            'totalVisitor' => $totalVisitor,
            'totalService' => $totalService,
            'totalCourse'  => $totalCourse,
            'totalProject' => $totalProject,
            'totalReview'  => $totalReview,
            'totalContact' => $totalContact,
            'totalPhoto'   => $totalPhoto,
            'totalPrivacy' => $totalPrivacy,
            'totalReturn'  => $totalReturn,
            'totalTerms'   => $totalTerms
        ]);

    }
}
