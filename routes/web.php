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

        Route::group(['prefix' => 'users'], function(){
            Route::get('/','UserController@users')->name('admin.users');
            Route::get('/delete/{id}','UserController@userDelete')->name('admin.users.delete');
            Route::get('/edit/{id}', 'UserController@get_user')->name('get.status.user');
            Route::post('/edit/{id}', 'UserController@change_status')->name('change.status.user');
        });
        
        Route::group(['prefix' => 'teacher'], function(){
            Route::get('/','TeacherController@index')->name('teacher.index');
            Route::get('/create','TeacherController@create')->name('teacher.create');
            Route::post('/store','TeacherController@store')->name('teacher.store');
            Route::get('/edit/{teacher}','TeacherController@edit')->name('teacher.edit');
            Route::post('/update/{teacher}', 'TeacherController@update')->name('teacher.update');
            Route::get('/delete/{id}', 'TeacherController@delete')->name('admin.teacher.delete');
        });

        Route::group(['prefix' => 'study-abroad'], function(){
            Route::get('/', 'PostController@index')->name('study-abroad.index');
            Route::match(['get','post'], '/add', 'PostController@add')->name('study-abroad.add');
            Route::match(['get','post'], '/edit/{post}', 'PostController@edit')->name('study-abroad.edit');
            Route::get('/show/{post}', 'PostController@show')->name('study-abroad.show');
            Route::get('/delete/{id}', 'PostController@delete')->name('study-abroad.delete');
        });
        
        Route::group(['prefix' => 'category'], function(){
            Route::get('/', 'CategoryController@index')->name('category.index');
            Route::match(['get','post'], '/create', 'CategoryController@create')->name('category.create');
            Route::match(['get','post'], '/edit/{category}', 'CategoryController@edit')->name('category.edit');
            Route::get('/delete/{course}', 'CategoryController@delete')->name('category.delete');
        });

        Route::group(['prefix' => 'course'], function(){
            Route::get('/', 'CourseController@index')->name('course.index');
            Route::get('/add', 'CourseController@addCourse')->name('course.add');
            Route::post('/create', 'CourseController@create')->name('course.create');
            Route::get('/edit/{course}', 'CourseController@edit')->name('course.edit');
            Route::post('/edit/{course}', 'CourseController@update')->name('course.update');
            Route::get('/delete/{course}', 'CourseController@delete')->name('course.delete');
            Route::get('/{course}/lessons', 'CourseController@lessons')->name('course.lessons');            
        });

        Route::group(['prefix' => 'lesson'], function(){
            Route::get('/add', 'LessonController@add')->name('lesson.add');
            Route::post('/create', 'LessonController@create')->name('lesson.create');
            Route::get('/edit/{lesson}', 'LessonController@edit')->name('lesson.edit');
            Route::post('/edit/{lesson}', 'LessonController@update')->name('lesson.update');
            Route::get('/delete/{lesson}', 'LessonController@delete')->name('lesson.delete');
            Route::get('/show/{lesson}', 'LessonController@show')->name('lesson.show');
        });

        Route::group(['prefix' => 'exams'], function(){
            Route::get('/','ExamController@exams')->name('admin.exams');
            Route::match(['get', 'post'], '/create', 'ExamController@createExam')->name('admin.exams.create');
            Route::match(['get', 'post'], '/update/{id}', 'ExamController@updateExam')->name('admin.exams.update');
            Route::get('/delete/{id}','ExamController@deleteExam')->name('exam.delete');
            Route::get('/view/{id}','ExamController@view')->name('admin.exams.view');
            Route::match(['get','post'], '/{exam_id}/question/create','ExamController@createQuestion')->name('admin.create.question');
            Route::match(['get','post'],'/{exam_id}/question/edit/{question_id}','ExamController@editQuestion')->name('admin.question.edit');
            Route::get('/question/delete/{id}','ExamController@questionDelete')->name('admin.question.delete');
        });

        Route::group(['prefix' => 'testimonials'], function(){
            Route::get('/','TestimonialController@index')->name('admin.testimonials');
            Route::match(['get', 'post'], '/create', 'TestimonialController@create')->name('admin.testimonials.create');
            Route::match(['get', 'post'], '/edit/{id}', 'TestimonialController@edit')->name('admin.testimonials.edit');
            Route::get('/delete/{id}', 'TestimonialController@delete')->name('testimonial.delete');
        });

        Route::group(['prefix' => 'pages'], function(){
            Route::get('/','PageController@index')->name('admin.page');
            Route::match(['get', 'post'], '/create', 'PageController@create')->name('admin.page.create');
            Route::match(['get', 'post'], '/edit/{id}', 'PageController@edit')->name('admin.page.edit');
            Route::get('/delete/{id}', 'PageController@delete')->name('admin.page.delete');
        });

        Route::group(['prefix' => 'appels'], function(){
            Route::get('/','MainController@appels')->name('admin.appels');
            Route::get('/delete/{id}','MainController@appelDelete')->name('admin.appels.delete');
        });

    });

});

/* Frontend routes */

Route::group([
    // 'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Auth::routes();
    Route::get('', 'Blog\Front\FrontController@home')->name('home');

    Route::get('/about', 'Blog\Front\FrontController@about')->name('about');

    // Route::get('/courses', 'Blog\Front\FrontController@courses')->name('courses');
    Route::group(['prefix' => 'subjects'], function(){
        Route::get('/', 'Blog\Front\FrontController@onlineCourses')->name('online-courses');
        Route::get('/{id}', 'Blog\Front\FrontController@course')->name('in.course');
        Route::get('/{course_id}/{lesson}', 'Blog\Front\FrontController@lesson')->middleware('buyer')->name('in.lesson');
    });

    Route::group(['prefix' => 'study-abroad'], function(){
        Route::get('/', 'Blog\Front\FrontController@studyAbroad')->name('study-abroad');
        Route::get('/{slug}', 'Blog\Front\FrontController@inStudyAbroad')->name('in.study-abroad');
    });

    Route::get('/contact', 'Blog\Front\FrontController@contact')->name('contact');
    Route::get('exams','Blog\Front\MainController@exams')->name('exams');

    Route::group(['prefix' => 'exam', 'middleware' => 'examiner'], function(){
        Route::get('/{id}','Blog\Front\MainController@getExam')->name('get.exam');
        Route::get('myresults/', 'Blog\Front\MainController@getAllResults')->name('get.allResults');
        Route::get('myresults/{result_id}', 'Blog\Front\MainController@getResult')->name('get.result');
        Route::post('/{id}/to-check', 'Blog\Front\MainController@checkExam')->name('check.exam');
    });
    Route::get('/{slug}', 'Blog\Front\FrontController@page')->name('page');

});




