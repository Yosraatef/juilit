<?php
use Spatie\Sitemap\SitemapGenerator;

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
if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}

View::creator('site.layouts.header', function($view) {
    $view->with('sections', \App\Section::all());

});
 Route::get('clear', function () {

Artisan::call('view:clear');
echo 'success';
});
Route::group(['namespace'=>'site'],function (){
	Route::get('/', 'HomeController@home')->name('home');
  Route::get('/details/{slug}', 'HomeController@details')->name('details');
  Route::get('/search', 'HomeController@search')->name('search');
  Route::post('/comment/{slug}', 'HomeController@savComment')->name('comment');
  Route::get('/section/{id}', 'HomeController@singlePage')->name('section');
  Route::get('sitemape',function(){

    SitemapGenerator::create('http://localhost')->writeToFile('sitemap.xml');

    return 'create sitemape';
});

});


Route::group(['prefix' => 'admin' , 'namespace'=>'admin'],function (){



    Route::middleware('auth:admin')->group(function(){

        Route::get('dashboard','DashboardController@index')->name('dashboard');

        //Users

        Route::get('users','AdminAdminController@show_users')->name('admin.users');
        Route::post('users','AdminAdminController@store_users')->name('admin.users.store');
        Route::get('users/{id}/edit','AdminAdminController@edit_users')->name('admin.users.edit');
        Route::put('users/{id}','AdminAdminController@update_users')->name('admin.users.update');
        Route::delete('users/{id}','AdminAdminController@delete_users')->name('admin.users.delete');

        
          //Settings
        Route::get('settings','AdminSettingController@index')->name('settings');
        Route::get('settings/create','AdminSettingController@create')->name('settings.create');
        Route::post('settings','AdminSettingController@store')->name('settings.store');

        //sections
        Route::resource('admin/section','AdminSectionController');
        //posts
        Route::resource('admin/post','AdminPostController');

         //images
        Route::resource('admin/image','AdminImagesController');
        //ckEditor
        Route::get('/ajax-subcat/{id}',function ($id) {
        $post = App\Post::where('section_id','=',$id)->get();
        return Response::json($post);});

        //news
        Route::resource('admin/new','AdminNewController');

        //banner
        Route::resource('admin/banner','AdminBannerController');

         //tag
        Route::resource('admin/tag','AdminTagController');
    });

     Route::get('login','AdminAdminController@index')->name('admin.login');
     Route::post('login','AdminAdminController@store')->name('login.store');
     Route::post('logout','AdminAdminController@logout')->name('admin.logout');


});