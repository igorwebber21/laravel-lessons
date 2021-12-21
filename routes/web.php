<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


/*Route::get('/', function () {

    $res = 2+3;

   // $data['res'] = $res; return view('home', $data);
    return view('home', compact('res'));
})->name('home');


Route::get('/about', function () {

    return view('about');
});*/

/*
Route::get('/contact', function () {

    return view('contact');
});

Route::post('/send-email', function () {

    if($_POST){
        dump($_POST);
    }

    return 'Send email';
});*/


/*Route::match(['post', 'get'], '/contact', function () {

    if($_POST){
        dump($_POST);
    }

    return view('contact');
});*/


/*Route::match(['post', 'get', 'put'], '/contact', function () {

    if($_POST){
        dump($_POST);
    }

    return view('contact');
})->name('contact');

Route::view('/test', 'test', ['test' => 'Test data']);*/

//Route::redirect('about', 'contact');
//Route::redirect('about', 'contact', 301);
//Route::permanentRedirect('about', 'contact');

/*Route::get('/post/{id}', function ($id){
    return "Post $id";
});*/



//не обязател параметр
/*Route::get('/post/{id}/{slug?}', function ($id, $slug = null){
    return "Post $id | $slug";
})->name('post');*/


/*
Route::get('/post/{id}/{slug}', function ($id, $slug){
    return "Post $id | $slug";
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z0-9-]+']);*/




/*Route::prefix('admin')->name('admin.')->group( function(){
    Route::get('posts', function (){
        return 'Post lists';
    });

    Route::get('post/create', function (){
        return 'Post create';
    });

    Route::get('post/{id}/edit', function ($id){
        return "Edit post $id";
    })->name('post');
});*/

/*
Route::fallback(function (){
   // return redirect()->route('home');
    abort('404', 'Page not found');
});




/// Controllers
Route::get('/', 'HomeController@index');
Route::get('/test', 'HomeController@test');
Route::get('/test2', 'Test\TestController@index');
Route::get('/page/{slug}', 'PageController@show');

Route::resource('/admin/posts', 'PostController', ['parameters' => [
    'posts' => 'slug'
]]);*/


Route::get('/', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@create')->name('posts.create');
Route::post('/', 'HomeController@store')->name('posts.store');
Route::get('/page/about', 'PageController@show')->name('page.about');

//Route::get('/send', 'ContactController@send');

Route::match(['get', 'post'], '/send', 'ContactController@send')->name('send');

// allow for guest
Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');

    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});

Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');


Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::get('', 'MainController@index')->name('admin');
});



