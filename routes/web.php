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
// Route::get('admin/index');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Admin panel routes */

Route::group(['middleware'=>['status','auth']], function(){
    $groupData = [
        'namespace' => 'Blog\Admin',
        'prefix' => 'admin'
    ];

    Route::group($groupData, function(){
        Route::get('/', 'MainController@index')->name('admin.index');
        // Route::get('index', 'MainController@index')->name('admin.index');

    });

});
