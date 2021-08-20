@extends('layouts.front')
@section('content')
    
    
  
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/images/page-banner-2.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Kurslar</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Asosiy sahifa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kurslar</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== COURSES PART START ======-->

<section id="courses-part" class="pt-120 pb-120 gray-bg">
    <div class="container">
        {{-- <div class="row">
            <div class="col-lg-12">
                <div class="courses-top-search">
                    <ul class="nav float-left" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                        </li>
                        <li class="nav-item">
                            <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                        </li>
                        <li class="nav-item">Showning 4 0f 24 Results</li>
                    </ul> <!-- nav -->
                    
                    <div class="courses-search float-right">
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button type="button"><i class="fa fa-search"></i></button>
                        </form>
                    </div> <!-- courses search -->
                </div> <!-- courses top search -->
            </div>
        </div> <!-- row --> --}}
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                <div class="row">
                    @foreach ($courses as $course)
                    <div class="col-lg-4 col-md-6">
                        <div class="singel-course mt-30">
                            <div class="thum">
                                <div class="image">
                                    <img src="{{\Storage::url($course->image)}}" alt="Course">
                                </div>
                                <div class="price">
                                    <span>Free</span>
                                </div>
                            </div>
                            <div class="cont">
                                {{-- <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul> --}}
                                <div>Kategoriya({{$course->category->title_uz}})</div>
                                <a href="{{route('in.course', $course->id)}}"><h4>{{$course->translation->title}}</h4></a>
                                <div class="course-teacher">
                                    <div class="thum">
                                        <a href="#"><img src="{{asset('front/images/course/teacher/t-1.jpg')}}" alt="teacher"></a>
                                    </div>
                                    <div class="name">
                                        <a href="#"><h6> @if($course->teacher) {{$course->teacher->name_uz }} @endif</h6></a>
                                    </div>
                                    {{-- <div class="admin">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
                                            <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div> <!-- singel course -->
                    </div>
                        
                    @endforeach
                </div> <!-- row -->
            </div>
        </div> <!-- tab content -->
        <div class="row">
            <div class="col-lg-12">
                <nav class="courses-pagination mt-50">
                    {{$courses->links()}}
                    {{-- <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a href="#" aria-label="Previous">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                        <li class="page-item"><a class="active" href="#">1</a></li>
                        <li class="page-item"><a href="#">2</a></li>
                        <li class="page-item"><a href="#">3</a></li>
                        <li class="page-item">
                            <a href="#" aria-label="Next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul> --}}
                </nav>  <!-- courses pagination -->
            </div>
        </div>  <!-- row -->
    </div> <!-- container -->
</section>

@endsection