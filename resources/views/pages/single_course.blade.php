@extends('layouts.front')
@section('content')
     
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/images/page-banner-2.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>{{$course->translation->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                            <li class="breadcrumb-item"><a href="{{route('courses')}}">Online kurslar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$course->translation->title}}</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== COURSES SINGEl PART START ======-->

<section id="corses-singel" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="corses-singel-left mt-30">
                    <div class="title">
                        <h3>{{$course->translation->title}}</h3>
                    </div> <!-- title -->
                    <div class="course-terms">
                        <ul>
                            <li>
                                <div class="teacher-name">
                                    <div class="thum">
                                        @if ($course->teacher)
                                            
                                        <img src="{{\Storage::url($course->teacher->image)}}" alt="Teacher" style="max-width: 40px; height: 40px;">
                                        @endif
                                    </div>
                                    <div class="name">
                                        <span>O'qituvchi</span>
                                        <h6>@if ($course->teacher)
                                            {{$course->teacher->name_uz}}
                                        @endif</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="course-category">
                                    <span>Kategoriya</span>
                                    <h6>@if ($course->category)
                                        {{$course->category->title_uz}}
                                    @endif </h6>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- course terms -->
                    
                    <div class="corses-singel-image pt-50">
                        <img src="{{\Storage::url($course->image)}}" alt="Courses">
                    </div> <!-- corses singel image -->
                    
                    <div class="corses-tab mt-30">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Kurs haqida</a>
                            </li>
                            <li class="nav-item">
                                <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab" aria-controls="curriculam" aria-selected="false">Video darslar</a>
                            </li>
                            <li class="nav-item">
                                <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false">O'qituvchi</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Izoh</a>
                            </li> --}}
                        </ul>
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="overview-description">
                                    <div class="singel-description pt-40">
                                       @php
                                           echo $course->translation->body;
                                       @endphp
                                    </div>
                                    {{-- <div class="singel-description pt-40">
                                        <h6>Talablar</h6>
                                        <p>Bu joyda kursni boshlash uchun o'quvchidan qanday bilim va ko'niklamar ta'lab qilinadi, qaysi darajada bo'lishi kerak  kabi ma'lumotlar yoziladi .</p>
                                    </div> --}}
                                </div> <!-- overview description -->
                            </div>
                            <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                <div class="curriculam-cont">
                                    <div class="title">
                                        <h6>{{$course->translation->title}}</h6>
                                    </div>
                                    <div class="accordion" id="accordionExample">
                                       @php
                                           $i=1;
                                       @endphp
                                        @foreach ($course->lessons as $lesson)
                                        
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <a href="{{route('in.lesson',[$course->id,$lesson->id])}}" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <ul>
                                                        <li><i class="fab fa-youtube"></i></li>
                                                        <li><span class="lecture">Video 1.<?=$i; ?></span></li>
                                                        <li><span class="head">{{$lesson->translation->title}}</span></li>
                                                        <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> {{$lesson->time}}</span></span></li>
                                                    </ul>
                                                </a>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                               <div class="card-body">
                                                    <p><a href="{{route('in.lesson',[$course->id,$lesson->id])}}">
                                                    <img src="{{\Storage::url($lesson->image)}}" alt="Course" width="80" class="p-2"></a>{{$lesson->translation->excerpt}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach                                   
                                    </div>
                                </div> <!-- curriculam cont -->
                            </div>
                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                <div class="instructor-cont">
                                    <div class="instructor-author">
                                        <div class="author-thum">
                                            <img src="{{\Storage::url($course->teacher->image)}}" alt="Instructor" width="150px">
                                        </div>
                                        <div class="author-name">
                                            <a href="#"><h5>{{$course->teacher->name_uz}}</h5></a>
                                            <span>{{$course->teacher->direction_uz}}</span>
                                        </div>
                                    </div>
                                    <div class="instructor-description pt-25">
                                        <p>{{$course->teacher->text_uz}}</p>
                                    </div>
                                </div> <!-- instructor cont -->
                            </div>
                        </div> <!-- tab content -->
                    </div>
                </div> <!-- corses singel left -->
                
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="course-features mt-30">
                           <h4>Kurs detallari </h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i>Duaration : <span>10 Hours</span></li>
                                <li><i class="fa fa-clone"></i>Leactures : <span>09</span></li>
                                <li><i class="fa fa-beer"></i>Quizzes :  <span>05</span></li>
                                <li><i class="fa fa-user-o"></i>Students :  <span>100</span></li>
                            </ul>
                            {{-- <div class="price-button pt-10">
                                <span>Price : <b>$25</b></span>
                                <a href="#" class="main-btn">Enroll Now</a>
                            </div> --}}
                        </div> <!-- course features -->
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="singel-makelike mt-20" style="border-radius:3px; background: white; padding:20px;">
                            <h4>Yangiliklar</h4><br>
                            <ul>
                                @foreach ($news as $item)
                                <li>
                                     <a href="{{route('in.news',$item->slug)}}">
                                         <div class="singel-post">
                                            <div class="thum" style="float: left;padding-bottom: 20px; padding-right:20px">
                                                <img src="{{\Storage::url($item->image)}}" width="150px" alt="Blog">
                                            </div>
                                            <div class="cont">
                                                <h6>{{$item->title_uz}}</h6>
                                                <span>{{date('d M Y', strtotime($item->updated_at))}}</span>
                                            </div>
                                        </div> <!-- singel post -->
                                     </a>
                                </li>
                                @endforeach
                            </ul>
                        </div> <!-- saidbar post -->
                    </div>
                    {{-- <div class="col-lg-12 col-md-6">
                        <div class="You-makelike mt-30">
                            <h4>You make like </h4> 
                            <div class="singel-makelike mt-20">
                                <div class="image">
                                    <img src="{{asset('front/images/your-make/y-1.jpg')}}" alt="Image">
                                </div>
                                <div class="cont">
                                    <a href="#"><h4>Introduction to machine languages</h4></a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                        <li>$50</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="singel-makelike mt-20">
                                <div class="image">
                                    <img src="{{asset('front/images/your-make/y-1.jpg')}}" alt="Image">
                                </div>
                                <div class="cont">
                                    <a href="#"><h4>How to build a basis game with java </h4></a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                        <li>$50</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="singel-makelike mt-20">
                                <div class="image">
                                    <img src="{{asset('front/images/your-make/y-1.jpg')}}" alt="Image">
                                </div>
                                <div class="cont">
                                    <a href="#"><h4>Basic accounting from primary</h4></a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                        <li>$50</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div> <!-- row -->
        {{-- <div class="row">
            <div class="col-lg-8">
                <div class="releted-courses pt-95">
                    <div class="title">
                        <h3>Releted Courses</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="images/course/cu-2.jpg" alt="Course">
                                    </div>
                                    <div class="price">
                                        <span>Free</span>
                                    </div>
                                </div>
                                <div class="cont">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>(20 Reviws)</span>
                                    <a href="courses-singel.html"><h4>Learn basis javascirpt from start for beginner</h4></a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="images/course/teacher/t-2.jpg" alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="#"><h6>Mark anthem</h6></a>
                                        </div>
                                        <div class="admin">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
                                                <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                        <div class="col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="images/course/cu-1.jpg" alt="Course">
                                    </div>
                                    <div class="price">
                                        <span>Free</span>
                                    </div>
                                </div>
                                <div class="cont">
                                    Kategoriya
                                    <span>(20 Reviws)</span>
                                    <a href="courses-singel.html"><h4>Learn basis javascirpt from start for beginner</h4></a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="images/course/teacher/t-3.jpg" alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="#"><h6>Mark anthem</h6></a>
                                        </div>
                                        <div class="admin">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
                                                <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- releted courses -->
            </div>
        </div> <!-- row --> --}}
    </div> <!-- container -->
</section>

@endsection