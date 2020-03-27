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

Route::get('/', 'front\HomeController@index');

Auth::routes();
Route::resource('search','front\StepController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verification','HomeController@sendFeedback')->name('verification');
Route::get('/password/{var1}','SetPassController@index')->name('password');

Route::get('lawyer/routes', 'HomeController@lawyer')->middleware('lawyer');

Route::get('/lawyer', 'HomeController@lawyer')->name('lawyer');


Route::get('admin/home','AdminController@index')->name('admin.home');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::post('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::get('adminLogout','Admin\LoginController@logout')->name('admin.logout');



Route::resource('admin-category','Admin\AdmincategoryController');
Route::resource('admin-question','Admin\AdminquestionController');
Route::resource('admin-option','Admin\AdminoptionController');
Route::resource('admin-cateques','Admin\AdmincatequesController');
Route::resource('admin-profile','Admin\AdminProfileController');
Route::resource('admin-freelegaldoc','Admin\Freelegaldocx');
Route::resource('password','SetPassController');


Route::get('/search-view/{data}', function () {
    return view('frontend.front-pages.search');
});
Route::GET('/lawyer-registration','front\LawyerController@index')->name('lawyer-registration');
Route::GET('/dashboard','front\MyDashController@index')->name('dashboard');
// Admin category ajax
Route::GET('/checking_category_exist','Admin\AdmincategoryController@checking_category_exist');
Route::GET('/ajax_all_category','Admin\AdmincategoryController@ajax_all_category');

// Admin question ajax
Route::GET('/checking_question_exist','Admin\AdminquestionController@checking_question_exist'); 

// Admin question category ajax
Route::GET('/quesCateajaxcall','Admin\AdmincatequesController@quesCate_ajaxcall');
Route::GET('/ques_ajax','Admin\AdmincatequesController@ques_ajax');
Route::GET('/catetoques_ajax','Admin\AdmincatequesController@catetoques_ajax');
Route::GET('/ques_opt_ajax','Admin\AdmincatequesController@ques_opt_ajax');
Route::GET('/checking_priority_with_count','Admin\AdmincatequesController@checking_priority_with_count');
Route::GET('/category_priority','Admin\AdmincatequesController@category_priority');
Route::GET('/optionchange_method_ajax','Admin\AdmincatequesController@optionchange_method_ajax');

// Admin option ajax
Route::GET('/option_type_ajax','Admin\AdminoptionController@option_type_ajax');

// dashboard option ajax
Route::GET('/countAjaxCall','Admin\Dashboard_controller@countCateAjaxCall');
Route::GET('/countAjaxQuesCall','Admin\Dashboard_controller@countQuesAjaxCall');


// frontend country list ajax
Route::GET('/countryAjaxCall','front\Country_controller@showAllCountry');
// frontend timezone list ajax
Route::GET('/timezoneAjaxCall','front\Country_controller@showAllZone');
// frontend timezone ip jax
Route::GET('/ipZoneAjaxCall','front\Country_controller@ipCheck');


// frontend ajax category/home page
Route::GET('/homeCateAjax','front\ajax\FrontController@index');
// question added front ajax
Route::GET('/jobQuestionSelect','front\ajax\FrontController@categoryFuncSelect');
Route::GET('/jobQuesOptSelect','front\ajax\FrontController@jobQuesOptSelect');
Route::GET('/mycountstate','front\ajax\FrontController@mycountstate');
Route::GET('/myCategoryQ','front\ajax\FrontController@myCategoryQ');