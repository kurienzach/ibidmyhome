<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

Route::get('/', 'UserPagesController@index');
Route::get('/pages/{page}', 'UserPagesController@pages');
Route::get('bid', 'UserPagesController@bid');
Route::post('bid', 'UserPagesController@place_bid');
Route::post('change_project', 'UserPagesController@change_project');

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/register', 'Auth\AuthController@postRegister');
/* Route::post('auth/register', function(Request $request) {
    //place the following code in the form action file
    //imp note: include vai.js on the form page.

    $appID = "446283845401754510"; // unique Application ID
    $defaultUrl = "http://ibidmyhome.com/"; //URL of the website
    $name = $request->get('name'); 
    $email = $request->get('email'); 
    $mobile = $request->get('mobile'); 
    $source = "Register to Bid"; //(optional) Lead source - which form?
    $description = "";//(optional) optional message field

    $keyword = isset($_COOKIE['vaLead_Keyword']) ? $_COOKIE['vaLead_Keyword'] : "";
    $channel = isset($_COOKIE['vaLead_Channel']) ? $_COOKIE['vaLead_Channel'] : "";
    $campaign = isset($_COOKIE['vaLead_Campaign']) ? $_COOKIE['vaLead_Campaign'] : "";
    $placement = isset($_COOKIE['vaLead_Placement']) ? $_COOKIE['vaLead_Placement'] : "";
    $device = isset($_COOKIE['vaLead_Device']) ? $_COOKIE['vaLead_Device'] : "";

    $urlParams  = urlencode("recordData.fields['name'].value")."=".urlencode($name)."&";
    $urlParams .= urlencode("recordData.fields['email'].value")."=".urlencode($email)."&";
    $urlParams .= urlencode("recordData.fields['mobile'].value")."=".urlencode($mobile)."&";
    $urlParams .= urlencode("recordData.fields['channel'].value")."=".urlencode($channel)."&";
    $urlParams .= urlencode("recordData.fields['keyword'].value")."=".urlencode($keyword)."&";
    $urlParams .= urlencode("recordData.fields['placement'].value")."=".urlencode($placement)."&";
    $urlParams .= urlencode("recordData.fields['device'].value")."=".urlencode($device)."&";
    $urlParams .= urlencode("recordData.fields['pageUrl'].value")."=".urlencode($defaultUrl)."&";
    $urlParams .= urlencode("recordData.fields['prospectCapturingPoint'].value")."=".urlencode($source)."&";        
    $urlParams .= urlencode("recordData.fields['campaign'].value")."=".urlencode($campaign)."&";
    $urlParams .= urlencode("recordData.fields['description'].value")."=".urlencode($description);
    $url = "http://54.251.248.213:8080/VitruvianAnalytics/webToLead.html?module=lead&action=create&webToLead=Yes&appID=$appID&".$urlParams;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    $result = curl_exec($ch);

    // Run controller and method
    return App::make('App\Http\Controllers\Auth\AuthController')->postRegister($request);
}); */

// Password reset routes...
Route::post('password/email', function(Request $request) {
    $request->session()->flash('reset_confirm', 'Password reset mail send successfully');

    // Run controller and method
    return App::make('App\Http\Controllers\Auth\PasswordController')->postEmail($request);
});

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/payment', 'PaymentController@show_payment');
Route::post('/payment/process', 'PaymentController@payment_process');
Route::post('/payment/gateway', 'PaymentController@gateway');

// Admin routers

Route::get('admin', 'AdminController@index');

Route::get('admin/login', 'AdminController@show_login');
Route::post('admin/login', 'AdminController@process_login');
Route::get('admin/logout', 'AdminController@logout');

Route::get('admin/bid/{id}', 'AdminController@bid');
Route::get('admin/bid_csv', 'AdminController@bid_csv');
Route::get('admin/projects', 'AdminController@projects');
Route::get('admin/users', 'AdminController@users');
Route::get('admin/users/{id}', 'AdminController@user_details');
Route::get('admin/unit/{id}', 'AdminController@edit_unit');
Route::post('admin/unit', 'AdminController@save_unit');
Route::get('admin/coupons', 'AdminController@coupons');
Route::post('admin/coupons', 'AdminController@add_coupons');
