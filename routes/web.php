<?php

use Illuminate\Support\Facades\Route;


//Frontend
Route::get('/', 'HomeController@Index');
Route::get('/all-course', 'HomeController@AllCourse');
Route::get('/all-project', 'HomeController@AllProject');
Route::get('/blogs', 'HomeController@Blogs');
Route::get('/contact-us', 'HomeController@ContactPage');
Route::get('/terms-and-conditions', 'HomeController@TermsAndConditonsPage');
Route::get('/return-policy', 'HomeController@ReturnPolicyPage');
Route::get('/privacy-policy', 'HomeController@PrivacyPolicyPage');



Route::post('/mailSend', 'HomeController@MailSend');





//Backend//
Route::get('/dashboard', 'DashboardController@Dashboard')->middleware('loginCheck');;
Route::get('/visitor', 'VisitorController@Visitors')->middleware('loginCheck');;




//Admin Panel Slider Management Controller
Route::get('/sliders', 'SliderController@Sliders')->middleware('loginCheck');;
Route::get('/getSlidersData', 'SliderController@getSlidersData')->middleware('loginCheck');;
Route::post('/sliderAdd', 'SliderController@sliderAdd')->middleware('loginCheck');;
Route::post('/sliderDetails', 'SliderController@getSliderDetails')->middleware('loginCheck');;
Route::post('/sliderUpdate', 'SliderController@sliderUpdate')->middleware('loginCheck');;
Route::post('/sliderDelete', 'SliderController@sliderDelete')->middleware('loginCheck');;




//Admin Panel Service Management Controller
Route::get('/services', 'ServiceController@Services')->middleware('loginCheck');;
Route::get('/getServicesData', 'ServiceController@getServicesData')->middleware('loginCheck');;
Route::post('/serviceAdd', 'ServiceController@serviceAdd')->middleware('loginCheck');;
Route::post('/serviceDetails', 'ServiceController@getServiceDetails')->middleware('loginCheck');;
Route::post('/serviceUpdate', 'ServiceController@serviceUpdate')->middleware('loginCheck');;
Route::post('/serviceDelete', 'ServiceController@serviceDelete')->middleware('loginCheck');;


//Admin Panel Course Management Controller
Route::get('/courses', 'CourseController@Courses')->middleware('loginCheck');;
Route::get('/getCourseData', 'CourseController@getCourseData')->middleware('loginCheck');;
Route::post('/courseAdd', 'CourseController@courseAdd')->middleware('loginCheck');;
Route::post('/courseDetails', 'CourseController@getCourseDetails')->middleware('loginCheck');;
Route::post('/courseUpdate', 'CourseController@courseUpdate')->middleware('loginCheck');;
Route::post('/courseDelete', 'CourseController@courseDelete')->middleware('loginCheck');;


//Admin Panel Project Management Controller
Route::get('/projects', 'ProjectController@Projects')->middleware('loginCheck');;
Route::get('/getProjectData', 'ProjectController@getProjectData')->middleware('loginCheck');;
Route::post('/projectAdd', 'ProjectController@projectAdd')->middleware('loginCheck');;
Route::post('/projectDetails', 'ProjectController@getProjectDetails')->middleware('loginCheck');;
Route::post('/projectUpdate', 'ProjectController@projectUpdate')->middleware('loginCheck');;
Route::post('/projectDelete', 'ProjectController@projectDelete')->middleware('loginCheck');;



//Admin Panel Contacts Management Controller
Route::get('/contacts', 'ContactController@Contacts')->middleware('loginCheck');;
Route::get('/getContactData', 'ContactController@getContactData')->middleware('loginCheck');;
Route::post('/contactDelete', 'ContactController@contactDelete')->middleware('loginCheck');;



//Admin Panel Review Management Controller
Route::get('/reviews', 'ReviewController@Reviews')->middleware('loginCheck');
Route::get('/getReviewData', 'ReviewController@getReviewData')->middleware('loginCheck');
Route::post('/reviewAdd', 'ReviewController@reviewAdd')->middleware('loginCheck');
Route::post('/reviewDetails', 'ReviewController@getReviewDetails')->middleware('loginCheck');
Route::post('/reviewUpdate', 'ReviewController@reviewUpdate')->middleware('loginCheck');
Route::post('/reviewDelete', 'ReviewController@reviewDelete')->middleware('loginCheck');




//Admin Panel Privacy Policy Management Controller
Route::get('/privacy', 'PrivacyPolicyController@Privacy')->middleware('loginCheck');
Route::get('/getPrivacyData', 'PrivacyPolicyController@getPrivacyData')->middleware('loginCheck');
Route::post('/privacyDetails', 'PrivacyPolicyController@getPrivacyDetails')->middleware('loginCheck');
Route::post('/privacyUpdate', 'PrivacyPolicyController@privacyUpdate')->middleware('loginCheck');




//Admin Panel Return Policy Management Controller
Route::get('/return', 'ReturnPolicyController@Return')->middleware('loginCheck');
Route::get('/getReturnData', 'ReturnPolicyController@getReturnData')->middleware('loginCheck');
Route::post('/returnDetails', 'ReturnPolicyController@getReturnDetails')->middleware('loginCheck');
Route::post('/returnUpdate', 'ReturnPolicyController@returnUpdate')->middleware('loginCheck');




//Admin Panel Terms & Condition Management Controller
Route::get('/term', 'TermsAndConditionController@Term')->middleware('loginCheck');
Route::get('/getTermData', 'TermsAndConditionController@getTermData')->middleware('loginCheck');
Route::post('/termDetails', 'TermsAndConditionController@getTermDetails')->middleware('loginCheck');
Route::post('/termUpdate', 'TermsAndConditionController@termUpdate')->middleware('loginCheck');




//Admin Panel Photo Management Controller
Route::get('/photos', 'PhotoController@Photos')->middleware('loginCheck');
Route::post('/photoAdd', 'PhotoController@photoAdd')->middleware('loginCheck');
Route::get('/loadPhoto', 'PhotoController@loadPhotoJSON')->middleware('loginCheck');
Route::get('/loadPhotoJsonById/{id}', 'PhotoController@loadPhotoJsonById')->middleware('loginCheck');
Route::post('/photoDelete', 'PhotoController@photoDelete')->middleware('loginCheck');




//Admin Panel Login Management
Route::get('/admin', 'LoginController@AdminIndex');
Route::post('/onLogin', 'LoginController@onLogin');
Route::get('/logout', 'LoginController@onLogout');