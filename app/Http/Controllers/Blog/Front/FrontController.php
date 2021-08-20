<?php

namespace App\Http\Controllers\Blog\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\News;
use App\Models\Testimonial;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Post;
use App\Models\Category;
use App\Models\Page;
use App\Models\Lesson;
use Illuminate\Support\Facades\Mail;

class FrontController extends FrontBaseController
{
    public function home()
    {
        $testimonials = Testimonial::select('name_'.app()->getLocale() .' as name','direction_'.app()->getLocale().' as direction',
         'text_'.app()->getLocale(),'image')->get();
        $teachers = Teacher::select('name_'.app()->getLocale() . ' as name','position_'.app()->getLocale().' as position', 'image')->get(4);
        $courses = Course::with('translation')->limit(10)->get();        
        $categories = Category::select('title_'.app()->getLocale() .' as title','image')->get(6);
        $slider = Post::where('for_slider','1')->select('title_'.app()->getLocale().' as title',
        'excerpt_'.app()->getLocale().' as excerpt', 'slug', 'image')->get();
        $posts = Post::where('for_slider','0')->select('title_'.app()->getLocale(),
        'excerpt_'.app()->getLocale(), 'slug', 'image','updated_at')->get(12);
        $about = Page::where('slug','about-us')->select('excerpt_'.app()->getLocale().' as excerpt')->first();
        return view('pages.home',compact('testimonials', 'teachers', 'courses','posts','categories','slider','about'));
    }

    public function news()
    {
        $posts = Post::select('title_'.app()->getLocale().' as title',
        'excerpt_'.app()->getLocale().' as excerpt', 'slug', 'image')->paginate(12);
        return view('pages.news', compact('posts'));
    }

    public function onlineCourses()
    {
        $courses = Course::paginate(12);
        return view('pages.online-courses', compact('courses'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function about()
    {
        $page = Page::where('template','about')->first();
        $teachers = Teacher::all();
        return view('pages.about', compact('page', 'teachers'));
    }
    public function course($id)
    {
        $course = Course::find($id);
        $news = Post::limit(3)->get();
        if(!$course){
            abort(404);
        }
        return view('pages.single_course', compact('course','news'));
    }
    public function lesson($course_id,$id)
    {
        $lesson = Lesson::find($id);
        if(!$lesson){
            abort(404);
        }
        return view('pages.in_lesson', compact('lesson'));
    }

    public function inNews($slug)
    {
        $post= Post::where('slug',$slug)->first();
        $news = Post::where('slug','!=',$slug)->limit(5)->get();
        if(!$post){
            abort(404);
        }
        return view('pages.in_news', compact('post','news'));
    }
    public function page($slug)
    {
        $page = Page::where('slug',$slug)->first();
        if(!$page){
            abort(404);
        }
        if($page->template=='default'){
            return view('pages.page', compact('page'));
        }
        if($page->template=='about'){
            $teachers = Teacher::all();
            return view('pages.about', compact('page','teachers'));
        }
        if($page->template=='contacts'){
            return view('pages.contact', compact('page'));
        }
        if($page->template=='home'){
            return view('pages.home', compact('page'));
        }
        if($page->template=='form-page'){
            return view('pages.form-page', compact('page'));
        }
    }
}
