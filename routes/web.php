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
Route::get('viewfeedback/add-feedback','FeedbackController@create');
Route::post('viewfeedback/store','FeedbackController@store')->name('add_feedback');
Route::get('/','FrontController@home');
Route::get('/about','FrontController@about');
Route::get('/excellence','FrontController@accomodation');
Route::get('/room/{slug}','FrontController@room');
Route::get('/album','FrontController@facility');
Route::get('/contact','FrontController@contact');
Route::get('/album/{slug}','FrontController@gallery');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['register' => false]);

Route::group(['middleware'=> 'auth'],function()
{
Route::get('/logout', 'HomeController@logout')->name('logout');

// Route::get('/home', function () {
//     return view('test');
// });
// Route::get('/',function()
// {
// 	return view('cd-admin.dashboard.dashboard');
// });
Route::get('/viewroom/create','RoomController@create');
Route::get('/viewroom','RoomController@index');
Route::get('/viewaccomodation/create','AccomodationController@create');
Route::get('/viewaccomodation','AccomodationController@index');
Route::get('/viewfacility/create','FacilityController@create');
Route::get('/viewfacility','FacilityController@index');
Route::get('/viewfacility/view','FacilityController@view');
Route::get('/viewabout','AboutController@index');
Route::get('/viewfeedback','FeedbackController@index');
Route::get('/dashboard','DashboardController@index');
//Route::get('/reply/1','FeedbackController@reply');
Route::get('/back','BackController@back')->name('back');

//Carousel 
Route::get('/carousel/create','CarouselController@create');
Route::get('/carousel','CarouselController@view');
//Admin 
Route::get('/viewadmin','AdminController@view');

//Add Feedback
Route::get('reply/{id}','FeedbackController@replyform')->name('reply');

//Route for Room
Route::get('/viewroom/create','RoomController@create');
Route::post('/viewroom/store','RoomController@store')->name('add-room');
Route::post('/viewroom/update/{id}','RoomController@update')->name('update-room');
Route::get('/viewroom/delete/{id}','RoomController@delete')->name('delete-room');
Route::post('/viewroom/status/{id}','RoomController@statusupdate')->name('update-roomstatus');

//Route for Accomodation
Route::post('/viewaccomodation/store','AccomodationController@store')->name('add-accomodation');
Route::post('/viewaccomodation/update/{id}','AccomodationController@update')->name('edit-accomodation');
Route::post('/viewaccomodation/delete/{id}','AccomodationController@remove')->name('delete-accomodation');
Route::post('/viewaccomodation/status/{id}','AccomodationController@updatestatus')->name('update-accstatus');

//Route for Facility

Route::post('/viewfacility/create','FacilityController@store')->name('add-facility');
Route::get('/viewfacility/delete/{id}','FacilityController@remove')->name('delete-facility');
Route::get('/viewgallery/create','FacilityController@addgallery');
Route::POST('/viewfacility/status/{id}','FacilityController@statusupdate')->name('update-facilitystatus');


//Route for gallery
Route::post('/viewgallery/store','GalleryController@store')->name('add-gallery');
Route::get('/viewgallery/{id}','GalleryController@index')->name('view-gallery');
Route::get('/viewgallery/status/{id}','GalleryController@statusupdate')->name('update-gallerystatus');
Route::get('/viewgallery/create/{id}','GalleryController@addgallery');
Route::get('/viewgallery/delete/{id}','GalleryController@remove')->name('delete-gallery');


//Route for About
Route::get('/viewabout/create','AboutController@create');
Route::POST('/viewabout/store','AboutController@add')->name('add-about');
Route::POST('/viewabout/update/{id}','AboutController@update')->name('update-about');

//Route for Feedback

Route::post('/viewfeedback/send','FeedbackController@sendreply')->name('send-reply');
Route::get('/viewfeedback/delete/{id}','FeedbackController@remove')->name('delete-feedback');
Route::get('/viewfeedback/reply','FeedbackController@viewreply')->name('view-reply');
Route::get('/viewfeedback/reply/delete/{id}','FeedbackController@replyremove')->name('delete-reply');


//Route for Carousels
Route::get('/viewcarousel/create','CarouselController@create');
Route::get('/viewcarousel','CarouselController@view');
Route::post('/viewcarousel/create','CarouselController@add')->name('add-carousel');
Route::GET('/viewcarousel/status/{id}','CarouselController@updatestatus')->name('update_carouselstatus');
Route::get('/viewcarousel/delete/{id}','CarouselController@remove')->name('delete-carousel');

//Route for Tailored Programs

Route::get('/viewtailored/create','TailoredController@create');
Route::POST('/viewtailored/store','TailoredController@add')->name('add-tailor');
Route::get('/viewtailored','TailoredController@index')->name('view-tailor');
Route::get('/viewtailored/delete/{id}','TailoredController@remove')->name('delete-tailor');	
Route::POST('/viewtailored/status/{id}','TailoredController@updatestatus')->name('update-tailorstatus');
Route::POST('/viewtailored/update/{id}','TailoredController@update')->name('update-tailor');


//Route for Quick mail

Route::POST('/quick_mail','FeedbackController@quick_mail')->name('quick_mail');

//Route for Admin
Route::get('/viewadmin/create','AdminController@create');
Route::POST('/viewadmin/add','AdminController@add')->name('add-admin');



});