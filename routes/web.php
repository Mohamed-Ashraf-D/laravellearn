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
use App\Mail\welcomeMail;
use Illuminate\Support\Facades\Mail;
Route::get('/', function () {
    $data=[];
    $data['name']='Mohamed Ashraf';
    $data['age']='24';
    $data['job']='Software Developer';
    return view('welcome',compact('data'));
});

Route::get('/test2/{id}', function ($id) {
    return $id;
})->name('a');
Route::get('/test1', function () {
    return 'this is test1';
})->name('b');
Route::get('/test1/{id?}', function () {
    return 'this is test1';
})->name('b');

Route::namespace('Front')->group(function (){
    //
    Route::get('users','UserController@showAdminName');
});

Route::group(['prefix' =>'users','middleware'=>'auth'],function (){
   Route::get('/',function (){
       return 'welcome';
   }) ;
});

Route::group(['namespace'=>'Front'],function (){
    Route::get('first1','FirstController@showString1')->middleware('auth');
    Route::get('first2','FirstController@showString2');
    Route::get('first3','FirstController@showString3');
});
Route::get('login',function (){
   return 'you must be login to access this page' ;
})->name('login');

Route::get('index','Front\UserController@getIndex');
Route::get('landing','Front\UserController@showLanding');
Route::get('about','Front\UserController@showAbout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/email',function (){
    Mail::to('email@email.com')->send(new welcomeMail());
   return new welcomeMail();
});
