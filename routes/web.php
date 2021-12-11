<?php

use App\Models\Role;
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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
//Clear Config cache:
Route::get('/storage-link', function() {
    $exitCode = Artisan::call('storage:link');
    return '<h1>Storage link </h1>';
});

Route::post('/send-message', 'Blog\Front\MainController@sendMessage')->name('send.message');
Route::post('/appels', 'Blog\Front\MainController@appels')->name('appels');

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
        Route::get('/teacher/delete/{id}', 'TeacherController@delete')->name('admin.teacher.delete');
        Route::get('/study-abroad', 'PostController@index')->name('study-abroad.index');
        Route::match(['get','post'], 'study-abroad/add', 'PostController@add')->name('study-abroad.add');
        Route::match(['get','post'], 'study-abroad/edit/{post}', 'PostController@edit')->name('study-abroad.edit');
        Route::get('study-abroad/show/{post}', 'PostController@show')->name('study-abroad.show');
        Route::get('study-abroad/delete/{id}', 'PostController@delete')->name('study-abroad.delete');
        Route::get('categories', 'CategoryController@index')->name('category.index');
        Route::match(['get','post'], 'category/create', 'CategoryController@create')->name('category.create');
        Route::match(['get','post'], 'category/edit/{category}', 'CategoryController@edit')->name('category.edit');
        Route::get('category/delete/{course}', 'CategoryController@delete')->name('category.delete');
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
        Route::match(['get', 'post'], 'exams/update/{id}', 'ExamController@updateExam')->name('admin.exams.update');
        Route::get('exams/delete/{id}','ExamController@deleteExam')->name('exam.delete');
        Route::get('exams/view/{id}','ExamController@view')->name('admin.exams.view');
        Route::match(['get','post'], 'exams/{exam_id}/question/create','ExamController@createQuestion')->name('admin.create.question');

        Route::match(['get','post'],'exams/{exam_id}/question/edit/{question_id}','ExamController@editQuestion')->name('admin.question.edit');
        Route::get('exams/question/delete/{id}','ExamController@questionDelete')->name('admin.question.delete');

        Route::get('testimonials','TestimonialController@index')->name('admin.testimonials');
        Route::match(['get', 'post'], 'testimonials/create', 'TestimonialController@create')->name('admin.testimonials.create');
        Route::match(['get', 'post'], 'testimonials/edit/{id}', 'TestimonialController@edit')->name('admin.testimonials.edit');
        Route::get('testimonial/delete/{id}', 'TestimonialController@delete')->name('testimonial.delete');
        Route::get('page','PageController@index')->name('admin.page');
        Route::match(['get', 'post'], 'page/create', 'PageController@create')->name('admin.page.create');
        Route::match(['get', 'post'], 'page/edit/{id}', 'PageController@edit')->name('admin.page.edit');
        Route::get('/page/delete/{id}', 'PageController@delete')->name('admin.page.delete');
        Route::get('/appels','MainController@appels')->name('admin.appels');
        Route::get('/appels/delete/{id}','MainController@appelDelete')->name('admin.appels.delete');
        Route::get('/users','MainController@users')->name('admin.users');
        Route::match(['get','post'], '/user/edit/{id}', 'MainController@change_status')->name('change.status.user');
    });

});

/* Frontend routes */

Route::group([
    // 'namespace' => 'Blog\Front',
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    Auth::routes();
    Route::get('', 'Blog\Front\FrontController@home')->name('home');

    Route::get('/about', 'Blog\Front\FrontController@about')->name('about');

    // Route::get('/courses', 'Blog\Front\FrontController@courses')->name('courses');
    Route::get('/subjects', 'Blog\Front\FrontController@onlineCourses')->name('online-courses');
    Route::get('/subjects/{id}', 'Blog\Front\FrontController@course')->middleware(['buyer'])->name('in.course');
    Route::get('/subjects/{course_id}/{lesson}', 'Blog\Front\FrontController@lesson')->middleware(['buyer'])->name('in.lesson');
    Route::get('/contact', 'Blog\Front\FrontController@contact')->name('contact');
    Route::get('/study-abroad', 'Blog\Front\FrontController@studyAbroad')->name('study-abroad');
    Route::get('study-abroad/{slug}', 'Blog\Front\FrontController@inStudyAbroad')->name('in.study-abroad');
    Route::get('exams','Blog\Front\MainController@exams')->name('exams');
    Route::get('exam/{id}','Blog\Front\MainController@getExam')->middleware(['buyer'])->name('get.exam');
    Route::get('myresults/', 'Blog\Front\MainController@getAllResults')->middleware(['buyer'])->name('get.allResults');
    Route::get('myresults/{result_id}', 'Blog\Front\MainController@getResult')->middleware(['buyer'])->name('get.result');
    Route::post('exam/{id}/to-check', 'Blog\Front\MainController@checkExam')->name('check.exam');
    Route::get('/{slug}', 'Blog\Front\FrontController@page')->name('page');

});




