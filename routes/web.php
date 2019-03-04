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

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware'=>'auth'], function () {

    Route::get('/', function () {return view('admin.index');});
    //pages
    Route::resource('/page','PageController');
    Route::get('/page/{page}/gallery', 'PageController@gallery')->name('page.gallery');
    Route::get('/page/{page}/gallery/ord', 'PageController@orderImages')->name('page.orderImages');
    Route::get('/page/{page}/gallery/del', 'PageController@deleteImage')->name('page.deleteImage');
    Route::get('/page/{page}/gallery/add', 'PageController@addImage')->name('page.addImage');
    Route::get('/page/{page}/files', 'PageController@files')->name('page.files');
    Route::get('/page/{page}/files/ord', 'PageController@orderFiles')->name('page.orderFiles');
    Route::get('/page/{page}/files/del', 'PageController@deleteFile')->name('page.deleteFile');
    Route::get('/page/{page}/files/add', 'PageController@addFile')->name('page.addFile');
    Route::get('/page/{page}/comments', 'PageController@comments')->name('page.comments');
    Route::get('/page/{page}/comments/{comment}/approve','PageController@commentApprove')->name('page.comments.approve');
    Route::get('/page/{page}/comments/{comment}/delete','PageController@commentDelete')->name('page.comments.delete');

    //categories
    Route::resource('/category','CategoryController');
    //menu
    Route::resource('/menu','MenuController');
    //media
    Route::get('/media', 'MediaController@index')->name('media');
    Route::resource('/media/image','ImageUpController');
    Route::post('/media/image/destroyDZ', 'ImageUpController@deleteDropZone')->name('image.destroyDZ');
    Route::resource('/media/file','FileController');
    Route::post('/media/file/destroyDZ', 'FileController@deleteDropZone')->name('file.destroyDZ');
    Route::resource('/media/banner','BannerController');
    Route::post('/media/banner/destroyDZ', 'BannerController@deleteDropZone')->name('banner.destroyDZ');
    //users
    Route::resource('/user','UserController');
    Route::patch('/user/{user}/role/', 'UserController@updateRole')->name('user.updateRole');
    Route::put('/user/{user}/updateDetails/', 'UserController@updateDetails')->name('user.updateDetails');
    //testimonials
    Route::resource('/testimonial','TestimonialController');
    //tags
    Route::resource('/tag','TagController');
    //settings
    Route::resource('/setting','SettingController', ['except'=>['create','destroy','store','show','edit']]);

    Route::view('/{path?}', 'app');

});

Route::get('language', function () { return \App::getLocale(); });
Route::get('language/{locale}', function ($locale) { \Session::put('locale', $locale); return redirect()->back();});

//route search
Route::any('/search',['uses' => 'SearchController@getSearch','as' => 'search']);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', ['as'=>'postContact', 'uses'=>'HomeController@postContact']);
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('{category_slug}/{slug}', ['as'=>'blog.single','uses'=>'BlogController@getSingle']);
Route::get('{category_slug}/', ['as'=>'blog.category','uses'=>'BlogController@getCategory']);
Route::get('{menu_slug}/', ['as'=>'menu','uses'=>'BlogController@getMenu']);
Route::get('{slug}', ['as'=>'static','uses'=>'BlogController@getStatic']);
Route::get('/tags/{id}/{slug}', ['as'=>'tag','uses'=>'BlogController@getTag']);

//comments
Route::post('comments/{page_id}', ['as'=>'comment.store', 'uses'=>'CommentController@store']);

//author
Route::get('/author/{id}/{slug}', ['as'=>'author','uses'=>'BlogController@getAuthorPage']);
Route::post('/author/{id}/{slug}', ['as'=>'author','uses'=>'BlogController@sendAuthorMessage']);







