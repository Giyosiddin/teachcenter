<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

/* Frontend routes */

Route::group(['namespace' => 'Blog\Front'], function(){

    Route::get('/', 'MainController@home')->name('home');
});


/* Admin panel routes */

Route::group(['middleware'=>['status','auth']], function(){
    $groupData = [
        'namespace' => 'Blog\Admin',
        'prefix' => 'admin'
    ];

    Route::group($groupData, function(){

        Route::get('/', 'MainController@index')->name('admin.index');
        Route::resource('teacher', 'TeacherController');
        Route::post('teacher/{teacher}', 'TeacherController@update')->name('teacher.update');
        Route::get('/news', 'PostController@index')->name('news.index');
        Route::match(['get','post'], 'news/add', 'PostController@add')->name('news.add');
        Route::match(['get','post'], 'news/edit/{post}', 'PostController@edit')->name('news.edit');
        Route::get('news/show/{post}', 'PostController@show')->name('news.show');
        Route::delete('news/delete/{id}', 'PostController@delete')->name('news.delete');
        Route::get('categories', 'CategoryController@index')->name('category.index');
        Route::match(['get','post'], 'category/create', 'CategoryController@create')->name('category.create');
        Route::match(['get','post'], 'category/edit/{category}', 'CategoryController@edit')->name('category.edit');
        Route::delete('category/delete/{course}', 'CategoryController@delete')->name('category.delete');
        Route::get('course', 'CourseController@index')->name('course.index');
        Route::match(['get','post'], 'course/create', 'CourseController@create')->name('course.create');
        Route::match(['get','post'], 'course/edit/{course}', 'CourseController@edit')->name('course.edit');
        Route::get('course/delete/{course}', 'CourseController@delete')->name('course.delete');
        Route::get('lessons', 'LessonController@index')->name('lesson.index');
        Route::match(['get','post'], 'lesson/create', 'LessonController@create')->name('lesson.create');
        Route::match(['get','post'], 'lesson/edit/{lesson}', 'LessonController@edit')->name('lesson.edit');
        Route::get('lesson/delete/{lesson}', 'LessonController@delete')->name('lesson.delete');        
        Route::get('lesson/show/{lesson}', 'LessonController@show')->name('lesson.show');
        Route::get('exams','ExamController@exams')->name('admin.exams');
        Route::match(['get', 'post'], 'exams/create', 'ExamController@createExam')->name('admin.exams.create');
    });

});
