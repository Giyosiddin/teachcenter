@extends('layouts.front')
@section('content')



<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/images/page-banner-2.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Fanlar</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Asosiy sahifa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Fanlar</li>
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
                            </div>
                            <div class="cont">
                                {{-- <div>Kategoriya({{$course->category->title_uz}})</div> --}}
                                <a href="{{route('in.course', $course->id)}}"><h4>{{$course->translation->title}}</h4></a>
                                <div class="course-teacher">
                                    <div class="thum">
                                        <a href="#"><img src="{{\Storage::url($course->teacher->image)}}" alt="teacher"></a>
                                    </div>
                                    <div class="name">
                                        <a href="#"><h6> @if($course->teacher) {{$course->teacher->name_uz }} @endif</h6></a>
                                    </div>
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
                </nav>  <!-- courses pagination -->
            </div>
        </div>  <!-- row -->
    </div> <!-- container -->
</section>

@endsection
