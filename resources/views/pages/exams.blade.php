@extends('layouts.front')
@section('content')    
    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url('/front/images/page-banner-2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Online test</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Asosiy sahifa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Online test</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
       
    <section id="blog-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
              <div class="col-lg-12">                  
                    <h3>Online testlarimizni ishlash uchun saytda ro'yxatdan o'tgan bo'lishingiz zarur. </h3>
                  <div class="blog-details mt-30 row">
                        <div class="nav flex-column nav-pills col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php $i=1; ?>
                            @foreach($courses as $course)
                                <a class="nav-link @if($i==1) active @endif" id="v-pills-{{$course->id}}-tab" data-toggle="pill" href="#v-pills-{{$course->id}}" role="tab" aria-controls="v-pills-{{$course->id}}" aria-selected="true">
                                    {{$course->translation->title}}
                                </a>
                            <?php $i++; ?>
                            @endforeach
                        </div>
                        <div class="tab-content col-9" id="v-pills-tabContent">
                            <?php $i=1; ?>
                            @foreach($courses as $course)
                                <div class="tab-pane fade @if($i==1) show active @endif" id="v-pills-{{$course->id}}" role="tabpanel" aria-labelledby="v-pills-{{$course->id}}-tab">
                                    <ul class="nav">
                                    @foreach ($course->exams as $exam)
                                        <li>
                                           <a href="{{route('get.exam',$exam->id)}}"> {{$exam->title}}</a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            <?php $i++; ?>
                            @endforeach
                        </div>
                    </div> <!-- blog details -->
              </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
@endsection