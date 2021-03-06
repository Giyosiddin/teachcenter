@extends('layouts.front')

@section('content')

<section id="slider-part" class="slider-active">
    @foreach ($slider as $slide)
    <div class="single-slider bg_cover pt-150" style="background-image: url({{\Storage::url($slide->image)}})" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">{{$slide->title}}</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">{{$slide->excerpt}}</p>
                        <ul>
                            <li>
                            @if($slide->id == 12)
                            <a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="/courses" > Batafsil</a>
                            @elseif($slide->id == 17)
                            <a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="/study-abroad" >Batafsil</a>
                            @else
                            <a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#" >Batafsil</a>
                             @endif
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
        
    @endforeach
  
</section>

<!--====== SLIDER PART ENDS ======-->

<!--====== CATEGORY PART START ======-->

<section id="category-part">
    <div class="container">
        <div class="category pt-40 pb-80">
            <div class="row">
                <div class="col-lg-3">
                    <div class="category-text pt-40">
                        <h2>Yo'nalishlar</h2>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1 col-md-9 offset-md-1 col-sm-9 offset-sm-1 col-9 offset-1">
                    <div class="row category-slied @if($categories->count() >3)slider @endif mt-40">
                        @php
                         $i=1   
                        @endphp
                        @foreach($categories as $category)
                        <div class="col-lg-4">
                            <a >
                                <span class="singel-category text-center color-<?=$i; ?>">
                                    <span class="icon">
                                        <img src="{{\Storage::url($category->image)}}" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>{{$category->title}}</span>
                                    </span>
                                </span> <!-- singel category -->
                            </a>
                        </div>
                        @php
                            if($i<3){ $i++; }else{ $i=1;}
                        @endphp
                        @endforeach
                        
                    </div> <!-- category slied -->
                </div>
            </div> <!-- row -->
        </div> <!-- category -->
    </div> <!-- container -->
</section>

<!--====== CATEGORY PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="about-part" class="pt-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>Biz haqimizda</h5>
                    <h2>Class education</h2> <strong>O'quv-konsalting markazi</strong>
                </div> <!-- section title -->
                <div class="about-cont">
                    <p>{{$about->excerpt}}</p>
                    <a href="{{route('about')}}" class="main-btn mt-55">Batafsil</a>
                </div>
            </div> <!-- about cont -->
           <!--  <div class="col-lg-6 offset-lg-1">
                <div class="about-event mt-50">
                    <div class="event-title">
                        <h3>Upcoming events</h3>
                    </div> 
                   <ul>
                        <li>
                            <div class="singel-event">
                                <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                <a href="events-singel.html"><h4>Campus clean workshop</h4></a>
                                <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                            </div>
                        </li>
                        <li>
                            <div class="singel-event">
                                <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                <a href="events-singel.html"><h4>Tech Summit</h4></a>
                                <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                            </div>
                        </li>
                        <li>
                            <div class="singel-event">
                                <span><i class="fa fa-calendar"></i> 2 December 2018</span>
                                <a href="events-singel.html"><h4>Enviroement conference</h4></a>
                                <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                            </div>
                        </li>
                    </ul>
                </div> 
            </div> -->
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="about-bg">
        {{-- <img src="{{asset('front/images/about/bg-1.png')}}" alt="About"> --}}
        <img src="{{\Storage::url($about->image)}}" alt="About">
    </div>
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== VIDEO FEATURE PART START ======-->

<section id="video-feature" class="bg_cover pt-60 pb-110" style="background-image: url({{asset('front/images/bg-1.jpg')}})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-last order-lg-first">
                <div class="video text-lg-left text-center pt-50">
                    <a class="Video-popup" href="https://www.youtube.com/watch?v=lCtp49PE6_c"><i class="fa fa-play"></i></a>
                </div> <!-- row -->
            </div>
            <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                <div class="feature pt-50">
                    <div class="feature-title">
                        <h3>Bizning afzalliklarimiz</h3>
                    </div>
                    <ul>

                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <!-- <img src="images/all-icon/f-3.png" alt="icon"> -->
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    
                                </div>
                                <div class="cont">
                                    <h4>Tajribali mutaxasislar</h4>
                                    <p>Foydalanuvchilar uchun qo'shimcha elektron test .</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                   <i class="fas fa-graduation-cap"></i>
                                    <!-- <img src="images/all-icon/f-1.png" alt="icon"> -->
                                </div>
                                <div class="cont">
                                    <h4>Yuqori va sifatli xizmat </h4>
                                    <p>Xizmatlar va ta'lim sifati doim nazorat qilinadi.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <!-- <img src="images/all-icon/f-3.png" alt="icon"> -->
                                  <i class="fas fa-edit"></i>
                                </div>
                                <div class="cont">
                                    <h4>Bonus uchun video darslar va nazorat testi</h4>
                                    <p>Foydalanuvchilar uchun qo'shimcha elektron test .</p>
                                </div>
                            </div> 
                          
                        </li>                       
                    </ul>
                </div> <!-- feature -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="feature-bg"></div> <!-- feature bg -->
</section>

<!--====== VIDEO FEATURE PART ENDS ======-->
<!--====== COURSE PART START ======-->

<section id="course-part" class="pt-115 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-45">
                    <h5>Video darslar</h5>
                    <h2>Tanlangan darslar</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row course-slied mt-30">
            @foreach ($courses as $course)
                
            <div class="col-lg-4">
                <div class="singel-course">
                    <div class="thum">
                        <div class="image">
                            <img src="{{\Storage::url($course->image)}}" alt="Course">
                        </div>
                        {{-- <div class="price">
                            <span>Tekin</span>
                        </div> --}}
                    </div>
                    <div class="cont">
                       {{--  <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>--}}
                        {{-- <div>Kategoriya({{$course->category->title_uz}})</div> <br> --}}
                        <a href="{{route('in.course', $course->id)}}"><h4>{{$course->translation->title}}</h4></a>
                        <div class="course-teacher">
                            <div class="thum">
                                <a href="#">@if($course->teacher) <img src="{{\Storage::url($course->teacher->image)}}" alt="teacher"> @endif</a>
                            </div>
                            <div class="name">
                                <a href="#"><h6><small>O'qituvchi</small>@if($course->teacher) {{$course->teacher->name_uz}} @endif</h6></a>
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
          
        </div> <!-- course slied -->
    </div> <!-- container -->
</section>

<!--====== COURSE PART ENDS ======-->

<!--====== TEASTIMONIAL PART START ======-->

<section id="testimonial" class="bg_cover pt-115 pb-115" data-overlay="8" style="background-image: url({{asset('front/images/bg-2.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-40">
                    <h5>Bizning birituvchilar</h5>
                    <h2>Fikr va mulohazalar</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row testimonial-slied mt-40">
            @foreach ($testimonials as $item)                
            <div class="col-lg-6">
                <div class="singel-testimonial">
                    <div class="testimonial-thum">
                        <img src="{{\Storage::url($item->image)}}" alt="Testimonial">
                        <div class="quote">
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="testimonial-cont">
                          <p>{{$item->text_uz}}</p>
                        <h6>{{$item->name}}</h6>
                        <span>{{$item->direction}}</span>
                    </div>
                </div> <!-- singel testimonial -->
            </div>
            @endforeach
        </div> <!-- testimonial slied -->
    </div> <!-- container -->
</section>

@endsection