@extends('layouts.front')
@section('content')
    
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{\Storage::url($lesson->image)}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>{{$lesson->translation->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                            <li class="breadcrumb-item"><a href="{{route('courses')}}">Online darslar</a></li>
                            <li class="breadcrumb-item"><a href="{{route('in.course',$lesson->course->id)}}">{{$lesson->course->translation->title}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$lesson->translation->title}}</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== EVENTS PART START ======-->

<section id="event-singel" class="pt-120 pb-120 gray-bg">
    <div class="container">
        <div class="events-area">
            <div class="row">
                <div class="col-lg-8">
                    <div class="events-left">
                        <h3>{{$lesson->translation->title}}</h3>
                        <a href="#"><span><i class="fa fa-calendar"></i> {{date('d M Y', $lesson->update_at)}}</span></a>
                        <a href="#"><span><i class="fa fa-clock-o"></i> {{$lesson->time}}</span></a>
                        {{-- <a href="#"><span><i class="fa fa-map-marker"></i> Rc Auditorim</span></a> --}}
                        <br>
                        <iframe width="100%" height="315" 
                        src="{{$lesson->video}}">
                        </iframe>
                        {{-- <img src="{{\Storage::url($lesson->image)}}" alt="Event" width="100%"> --}}
                        @php
                            echo $lesson->translation->body;
                        @endphp
                    </div> <!-- events left -->
                </div>
                <div class="col-lg-4">
                    <div class="events-right">
                        {{-- <div class="events-coundwon bg_cover" data-overlay="8" style="background-image: url(images/event/singel-event/coundown.jpg)">
                            <div data-countdown="2020/03/12"></div>
                            <div class="events-coundwon-btn pt-30">
                                <a href="#" class="main-btn">Book Your Seat</a>
                            </div>
                        </div> <!-- events coundwon --> --}}
                        <div class="events-address mt-30">
                            <ul>
                                <li>
                                    <div class="singel-address">
                                        <div class="icon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="cont">
                                            <h6>Davomiyligi</h6>
                                            <span>{{$lesson->time}}</span>
                                        </div>
                                    </div> <!-- singel address -->
                                </li>
                                <li>
                                    <div class="singel-address">
                                        <div class="icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="cont">
                                            <h6>O'qituvhchi</h6>
                                            <span>{{$lesson->course->teacher->name_uz}}</span>
                                        </div>
                                    </div> <!-- singel address -->
                                </li>
                                <li>
                                    <div class="singel-address">
                                        <div class="icon">
                                            <i class="fa fa-map"></i>
                                        </div>
                                        <div class="cont">
                                            <h6>Til</h6>
                                            <span>{{$lesson->translation->locale}}</span>
                                        </div>
                                    </div> <!-- singel address -->
                                </li>
                            </ul>
                            
                        </div> <!-- events address -->
                    </div> <!-- events right -->
                </div>
            </div> <!-- row -->
        </div> <!-- events-area -->
    </div> <!-- container -->
</section>

@endsection