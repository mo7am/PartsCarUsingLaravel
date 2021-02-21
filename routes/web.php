<?php
use Illuminate\Support\Facades\Schema;
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

Route::pattern('id' , '[0-9]+');

Route::get('/', function () {
    return view('welcome');
});

Route::get('indexlogin', 'index@index');

Route::get('/', function () {
    
    /*schema::create('programmers' , function($mytable)
    {
      $mytable ->increments('id');
      $mytable ->string('fname' , 20);
      $mytable ->string('lname' ,20);
      $mytable ->string('description' , 500);
      $mytable ->date('created');
      $mytable ->string('age');
    });*/
    
    return view('welcome' , array ('country'=>'Egypt', 'city'=>'cairo'));
});

Route::get('signup', function () {
    return view('signup');
});

Route::get('about/m/{me}', function ($me) {
    return 'Welcome ' . $me . ' to page';
});

Route::get('contact', function () {
    return view('page1');
});

Route::get('about', function () {
    return view('page2');
});

Route::get('thanks', 'pageController@p1');


///////////////////////////////////////////////////////////

Route::get('pages', 'pageController@show');

Auth::routes();


Route::POST('AddPart','PostController@AddPart');

Route::get('/homepage', 'HomeController@index')->name('/homepage');
Route::get('/about', 'HomeController@about')->name('/about');
Route::get('/contact', 'HomeController@contact')->name('/contact');
Route::post('/AddMessage', 'HomeController@AddMessage')->name('/AddMessage');
Route::get('/lockscreen', 'HomeController@lockscreen')->name('/lockscreen');
Route::get('/mymessage', 'HomeController@mymessage')->name('/mymessage');
Route::get('/showcomment', 'HomeController@showcomment')->name('/showcomment');
Route::post('/addcomment', 'HomeController@addcomment')->name('/addcomment');
Route::post('/lockscreenlogin', 'HomeController@lockscreenlogin')->name('/lockscreenlogin');

Route::get('/community', 'HomeController@community')->name('/community');

Route::get('/showcommunitycomment', 'HomeController@showcommunitycomment')->name('/showcommunitycomment');
Route::post('/addcommunitycomment', 'HomeController@addcommunitycomment')->name('/addcommunitycomment');
Route::post('/addpost', 'HomeController@addpost')->name('/addpost');
Route::get('/showmyposts', 'HomeController@showmyposts')->name('/showmyposts');


Route::get('/CRUDparts', 'CRUDpartsController@index')->name('CRUDparts');
Route::get('/Allparts', 'AllpartsController@index')->name('/Allparts');
//Route::POST('AddPart', 'CRUDpartsController@create')->name('AddPart');


Route::POST('addPart', 'CRUDpartsController@addPart')->name('addPart');
Route::POST('/deletePart/{id}', 'CRUDpartsController@deletePart');

Route::post ( '/editPart/{id}/edit', 'CRUDpartsController@editPart' );
Route::get ( '/AddPhoto', 'CRUDpartsController@Add' );


Route::resource('parts','CRUDpartsController');
Route::get('/action','CRUDpartsController@action')->name('action');

Route::post('/photo', 'CRUDpartsController@update_avatar');
Route::get('/allgalaries','CRUDpartsController@allgalaries')->name('allgalaries');

Route::get('/partsgalary','AllpartsController@more');
Route::post('/buypart','AllpartsController@buy')->name('/buypart');;

Route::get('/partedit','CRUDpartsController@edit');
Route::get('/partshow','CRUDpartsController@show');
Route::get('/partcreate','CRUDpartsController@crate');
Route::get('/viewprofile','profilecontroller@index')->name('/viewprofile');

Route::post('/updateprofileimage','profilecontroller@updateprofileimage')->name('updateprofileimage');

Route::post('/updatecoverimage','profilecontroller@updatecoverimage')->name('updatecoverimage');

Route::post('/updatepassword','profilecontroller@updatepassword')->name('updatepassword');
Route::post('/updatedata','profilecontroller@updatedata')->name('/updatedata');


Route::get('/verify/{token}' ,'verifyController@verify')->name('verify');








Route::get('/CRUDAdmin','CRUDAdmin@index')->name('/CRUDAdmin');

Route::resource('crudadmins','CRUDAdminController');


  Route::resource('CRUDAdmin','CRUDAdminController');
  Route::POST('editUser','CRUDAdminController@editUser');
  Route::POST('deleteUser','CRUDAdminController@deleteUser');



Route::group(['middleware' => ['web']], function() {
  Route::resource('user','CRUDAdminController');
  Route::POST('addAdmin','CRUDAdminController@addAdmin');
  Route::POST('editAdmin','CRUDAdminController@editAdmin');
  Route::POST('deleteAdmin','CRUDAdminController@deleteAdmin');
});







