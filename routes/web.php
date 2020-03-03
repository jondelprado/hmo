<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//ADMIN PANEL & COORDINATOR PANEL
Route::get('/', 'LandingController@index');
Route::group(['middleware' => ['web','auth']], function(){

  Route::get('/dashboard', function(){

    if (Auth::user()->admin == 1) {

      $sidebarStatus = array(
        'maintenance_menu' => 'menu_close',
        'maintenance_link' => 'link_inactive'
      );
      return view('dashboard')->with($sidebarStatus);

    }
    else {
      return view('coordinator.dashboard');
    }

  });

});


//COORDINATOR & COORDINATOR PANEL
// Route::get('/coordinator', 'CoordinatorController@loginPage');
Route::resource('utilities/coordinator', 'CoordinatorController');
Route::get('/utilities/coordinator/{coordinator}/view', 'CoordinatorController@show');
//DOCTOR
Route::resource('/claims/doctor', 'DoctorController');
Route::get('/claims/doctor/{claim}/view', 'DoctorController@show');

//MAINTENANCE
Route::resource('/maintenance/category', 'CategoryController');
Route::resource('/maintenance/coverage', 'CoverageController');
Route::resource('/maintenance/services/standard', 'ServicesStandardController');
Route::resource('/maintenance/services/additional', 'ServicesAdditionalController');
Route::resource('/maintenance/room', 'RoomController');
Route::resource('/maintenance/requirement', 'RequirementController');
Route::resource('/maintenance/membership', 'MembershipController');
Route::resource('/maintenance/pre-existing-condition', 'PECController');
Route::resource('/maintenance/plan', 'PlanController');
Route::get('/maintenance/plan/{plan}/view', 'PlanController@show');


//TRANSACTION
Route::resource('/transaction/contract/hospital', 'HospitalController');
Route::get('/transaction/contract/hospital/{hospital}/view', 'HospitalController@show');

Route::resource('/transaction/contract/company', 'CompanyController');
Route::get('/transaction/contract/company/{company}/view', 'CompanyController@show');

Route::resource('/transaction/contract/member', 'MemberController');
Route::get('/transaction/contract/member/{member}/view', 'MemberController@show');

//AJAX & POST REQUESTS

//FOR MEMBER
Route::post('/transaction/contract/member/create/membership', 'MemberController@retrieveMembership');
Route::post('/transaction/contract/member/create/company-plan', 'MemberController@retrieveCompanyPlan');
Route::post('/transaction/contract/member/create/store', 'MemberController@store');

//FOR COORDINATOR
// Route::post('/coordinator/dashboard', 'CoordinatorController@coordinatorLogin');
// Route::post('/coordinator/register', 'CoordinatorController@coordinatorRegister');
// Route::post('/coordinator', 'CoordinatorController@coordinatorCredentials');












//
