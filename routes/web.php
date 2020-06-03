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
Route::get('about-us', 'Admin\AboutController@showFrontAbout');
// contact front page
Route::get('contact', 'front\ContactController@index');


Route::resource('admin-about','Admin\AboutController');
Route::resource('admin-category','Admin\AdmincategoryController');
Route::resource('admin-question','Admin\AdminquestionController');
Route::resource('admin-option','Admin\AdminoptionController');
Route::resource('admin-cateques','Admin\AdmincatequesController');
Route::resource('admin-profile','Admin\AdminProfileController');
Route::resource('admin-freelegaldoc','Admin\Freelegaldocx');
Route::resource('password','SetPassController');

/* backend ajax */
// about
Route::POST('/aboutUsDetailsAdd','Admin\AboutController@create');
Route::GET('/showAboutDetails','Admin\AboutController@show');
Route::POST('/aboutUsDetailsEdit','Admin\AboutController@update');
/* end backend ajax */

Route::get('/search-view/{data}', function () {
    return view('frontend.front-pages.search');
});
Route::GET('/lawyer-registration','front\LawyerController@index')->name('lawyer-registration');
Route::GET('/lawyer-register-specialization','front\LawyerController@category_lawyer_type');
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
Route::GET('/countlawyerAjaxCall','Admin\Dashboard_controller@countlawyerAjaxCall');
Route::GET('/countclientAjaxCall','Admin\Dashboard_controller@countclientAjaxCall');

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
Route::GET('/nextQuestionRound','front\ajax\FrontController@nextQuestionRound');
Route::GET('/nextQuesInitId','front\ajax\FrontController@nextQuesInitId');
Route::GET('/multiOptionN','front\ajax\FrontController@multiOptionN');
Route::GET('/submitClientJobData','front\ajax\FrontController@submitClientJobData');
Route::GET('/checking_email_registration','front\ajax\FrontController@checking_email_registration');

// front dashboard add ajax
Route::GET('/country_change_dashboard','front\ajax\FrontController@country_change_dashboard');
Route::GET('/updateProfilePage','front\ajax\FrontController@updateProfilePage');
Route::GET('/updateProfilePassPage','front\ajax\FrontController@updateProfilePassPage');
Route::GET('/updateLawyerProfilePage','front\ajax\FrontController@updateLawyerProfilePage');
Route::POST('/myImgFileUploadProfile','front\ajax\FrontController@myImgFileUploadProfile');
Route::POST('/ajaxPhoneVerifySendData','front\ajax\FrontController@ajaxPhoneVerifySendData');
Route::POST('/ajaxPhoneVerifyData','front\ajax\FrontController@ajaxPhoneVerifyData');
Route::GET('/myEmailForgotPasswordRecovery','ForgotPasswordMailAddress@sendFeedback');
Route::GET('/homeBannerAjax','front\ajax\FrontController@ajaxHomeBanner');
Route::GET('/homeItWorkAjax','front\ajax\FrontController@ajaxHomeWork');
Route::GET('/homeTestimonialsAjax','front\ajax\FrontController@ajaxHomeTestimonials');
Route::GET('/homeBehindPropandasAjax','front\ajax\FrontController@ajaxHomeBehindPropandas');
Route::GET('/ContactQueryMailControllerSendMail','ContactQueryMailController@sendFeedback');

// Backend Banner Data
Route::GET('/banner','Admin\HomeBannerController@index');
Route::GET('/banner/{id}','Admin\HomeBannerController@showBanner');
Route::GET('/bannerAdd','Admin\HomeBannerController@showAddForm');
Route::POST('/banner','Admin\HomeBannerController@createBanner');
Route::DELETE('/banner/{banner}','Admin\HomeBannerController@deleteBanner');
Route::PUT('/banner/{banner}','Admin\HomeBannerController@updateBanner');


// Backend workHome Data
Route::GET('/howitwork','Admin\HowItWorkController@index');
Route::GET('/howitwork/{id}','Admin\HowItWorkController@showBanner');
Route::GET('/howitworkAdd','Admin\HowItWorkController@showAddForm');
Route::POST('/howitwork','Admin\HowItWorkController@createBanner');
Route::DELETE('/howitwork/{howitwork}','Admin\HowItWorkController@deleteBanner');
Route::PUT('/howitwork/{howitwork}','Admin\HowItWorkController@updateBanner');

// Backend testimonials Data
Route::GET('/testimonials','Admin\HomeTestimonialsController@index');
Route::GET('/testimonials/{id}','Admin\HomeTestimonialsController@showBanner');
Route::GET('/testimonialsAdd','Admin\HomeTestimonialsController@showAddForm');
Route::POST('/testimonials','Admin\HomeTestimonialsController@createBanner');
Route::DELETE('/testimonials/{testimonials}','Admin\HomeTestimonialsController@deleteBanner');
Route::PUT('/testimonials/{testimonials}','Admin\HomeTestimonialsController@updateBanner');

// Backend behind propandas Data
Route::GET('/behindpropandas','Admin\HomeBehindPropandasController@index');
Route::GET('/behindpropandas/{id}','Admin\HomeBehindPropandasController@showBanner');
Route::GET('/behindpropandasAdd','Admin\HomeBehindPropandasController@showAddForm');
Route::POST('/behindpropandas','Admin\HomeBehindPropandasController@createBanner');
Route::DELETE('/behindpropandas/{behindpropandas}','Admin\HomeBehindPropandasController@deleteBanner');
Route::PUT('/behindpropandas/{behindpropandas}','Admin\HomeBehindPropandasController@updateBanner');

// heading
Route::GET('/behindpropandasheading/{id}','Admin\HomeBehindPropandasController@showBeahindHeading');
Route::GET('/behindpropandasheadingAdd','Admin\HomeBehindPropandasController@showBeahindHeadingAdd');
Route::POST('/behindpropandasheading','Admin\HomeBehindPropandasController@createBanneromeHeading');
Route::PUT('/behindpropandasheading/{behindpropandasheading}','Admin\HomeBehindPropandasController@updateBannerHeading');

// lawyer dashboard
Route::GET('/posted-jobs','front\lawyerDashboard\PostJobLawyerController@index');
Route::GET('/job-full-view/{jobview}','front\lawyerDashboard\PostJobLawyerController@job_full_view');
Route::GET('/apply-job/{applyjob}','front\lawyerDashboard\PostJobLawyerController@apply_job');




// lawyer dashoboard ajax
Route::GET('/all_posted_job_show','front\lawyerDashboard\ajax\LawyerDashboardAjaxController@full_view_all_jobs');
Route::GET('/current_selected_posted_job_show','front\lawyerDashboard\ajax\LawyerDashboardAjaxController@index');
Route::GET('/search_job_ajax','front\lawyerDashboard\ajax\LawyerDashboardAjaxController@search_job_ajax');
Route::GET('/apply-job-with-proposal','front\lawyerDashboard\ajax\LawyerDashboardAjaxController@apply_job_ajax');


// all category ajax
Route::GET('/jcategory_ajax','front\lawyerDashboard\ajax\LawyerDashboardAjaxController@jcategory_ajax');


// client dashboard 
Route::GET('/client-job-post','front\clientDashboard\PostJobClientController@index');


// client dashboard ajax
Route::GET('/categoryClientAjax','front\clientDashboard\ajax\ClientAjaxController@index');
Route::GET('/searchNextQuestion','front\clientDashboard\ajax\ClientAjaxController@searchNextQuestion');
Route::GET('/searchNextLast','front\clientDashboard\ajax\ClientAjaxController@searchNextLast');
Route::GET('/submitQuesAnsData','front\clientDashboard\ajax\ClientAjaxController@submitQuesAnsData');

// lawyers list after job posted from client-end
Route::GET('/related-lawyers','front\clientDashboard\PostJobClientController@related_lawyers');
Route::GET('/related-lawyers-ajax','front\clientDashboard\PostJobClientController@related_lawyers_ajax');
Route::GET('/notification-send-to-related-lawyer','front\clientDashboard\PostJobClientController@notification_send_to_related_lawyer');


// legal-info full front and backend
Route::GET('/legal-info','front\LegalInfoController@index');
Route::GET('/legal-info/{id}','front\LegalInfoController@showInfo');
Route::PUT('/legal-info/{legalinfo}','front\LegalInfoController@updateLegalInfo');
Route::GET('/frontLegalInfoFullDataShow','front\LegalInfoController@showLegalFrontInfo');


// Terms front and backend
Route::GET('/terms','front\TermsController@index');
Route::GET('/terms/{id}','front\TermsController@showInfo');
Route::PUT('/terms/{terms_condition}','front\TermsController@updateLegalInfo');
Route::GET('/frontTermsPage','front\TermsController@showLegalFrontInfo');



// Terms front and backend
Route::GET('/how-it-works','front\HowItWorksController@index');
Route::GET('/how-it-works/{id}','front\HowItWorksController@showInfo');
Route::PUT('/how-it-works/{how_it_works}','front\HowItWorksController@updateLegalInfo');
Route::GET('/frontHowItWorksPage','front\HowItWorksController@showLegalFrontInfo');


// Notification
Route::GET('/notification','front\clientDashboard\NotificationController@index');
Route::GET('/notify-all','front\clientDashboard\NotificationController@all_notification');
Route::GET('/notify-remove','front\clientDashboard\NotificationController@remove_notification');
Route::GET('/notification/{notify}','front\clientDashboard\NotificationController@current_notification');
Route::GET('/notification-single-show/','front\clientDashboard\NotificationController@single_full_view');
Route::GET('/unread-notify-count/','front\clientDashboard\NotificationController@unread_notify_count');


// client my job
Route::GET('/my-job','front\clientDashboard\ClientMyJobController@index');
Route::GET('/my-job-full-view','front\clientDashboard\ClientMyJobController@my_job_full_view');
Route::GET('/my-current-job/{mycurrentjob}','front\clientDashboard\ClientMyJobController@single_client_job');
Route::GET('/client_myjob_category_ajax','front\clientDashboard\ClientMyJobController@client_myjob_category_ajax');
Route::GET('/my_job_full_view_ajax','front\clientDashboard\ClientMyJobController@my_job_full_view_ajax');
Route::GET('/client_myjob_input_search_ajax','front\clientDashboard\ClientMyJobController@client_myjob_input_search_ajax');
Route::GET('/client_myjob_full_form_search_ajax','front\clientDashboard\ClientMyJobController@client_myjob_full_form_search_ajax');
Route::GET('/single-job-rquirement-proposal-ajax','front\clientDashboard\ClientMyJobController@single_job_page_with_proposal_count');

// client get proposal
Route::GET('/all-proposal/{allproposals}','front\clientDashboard\JobProposalController@index');
Route::GET('/all-proposal-ajax','front\clientDashboard\JobProposalController@project_id_wish_proposal');
Route::GET('/proposal-view/{proposal_view}','front\clientDashboard\JobProposalController@proposal_view');
Route::GET('/single-proposal-ajax','front\clientDashboard\JobProposalController@ajax_proposal_singlr_view');
Route::GET('/all-lawyer-country-load-ajax','front\clientDashboard\JobProposalController@country_load');
Route::GET('/all-lawyer-cities-load-ajax','front\clientDashboard\JobProposalController@cities_load');
Route::GET('/proposal_search_update_ajax','front\clientDashboard\JobProposalController@proposal_search_update_ajax');


// System Message

// frontend  
Route::GET('/system-message','front\SystemMsgController@index');
Route::GET('/current-system-message-details/{system_msg_id}','front\SystemMsgController@single_view');
Route::GET('/system-message/all-msg','front\SystemMsgController@all_msg_show');
Route::GET('/system-single-msg-ajax','front\SystemMsgController@single_msg_ajax');
Route::GET('/unseen-status-ajax','front\SystemMsgController@unseen_to_seen_function');
Route::GET('/unread-system-msg-count','front\SystemMsgController@unread_system_msg_count');
Route::GET('/count-system-msg-session','front\SystemMsgController@count_system_msg_session');
Route::GET('/close-system-msg','front\SystemMsgController@close_system_msg');

// backend
Route::GET('/admin/system-message/','Admin\AdminSystemMsg@create');
Route::GET('/admin/system-message/ajax','Admin\AdminSystemMsg@show_client_by_type');
Route::GET('/admin/system-message/ajax-project','Admin\AdminSystemMsg@show_project_by_client');
Route::POST('/admin/system-message/create-project','Admin\AdminSystemMsg@store');


// end of system message


// send direct invite notication  to lawyer (lawyer end)

Route::GET('/lawyer-notification','front\lawyerDashboard\NotificationController@index');
Route::GET('/lawyer-notification-ajax','front\lawyerDashboard\NotificationController@lawyer_notify');
Route::GET('/lawyer-notification-count-ajax','front\lawyerDashboard\NotificationController@count_unread_notification');
// end of invite lawyer notification (lawyer end)