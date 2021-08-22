@extends('layouts.front')
@section('content')
    
    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{\Storage::url($page->image)}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{$page->title_uz}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Asosiy sahifa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$page->title_uz}}</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== BLOG PART START ======-->
    
    <section id="blog-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
              <div class="col-lg-12">
                  <div class="blog-details mt-30">
                      <div class="thum">
                          <img src="{{\Storage::url($page->image)}}" alt="Blog Details" width="100%">
                      </div>
                      <div class="cont">
                          <h3>{{$page->title_uz}}</h3>
                          <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i> {{date('d M Y', strtotime($page->updated_at))}}</a></li>
                               {{-- <li><a href="#"><i class="fa fa-user"></i>Mark anthem</a></li>
                               <li><a href="#"><i class="fa fa-tags"></i>Education</a></li> --}}
                           </ul>
                           @php
                               echo $page->body_uz;
                           @endphp
                           {{-- <ul class="share">
                               <li class="title">Share :</li>
                               <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           </ul> --}}
                         
                      </div> <!-- cont -->
                      <div class="contact-from">
                        <div class="section-title">
                            <h5>Bog'lanish</h5>
                             <h2>
                                
                            @php
                                if (\Request::path() == 'consalting')
                                    {
                                       echo "Konsalting xizmati uchun ariza jo'nating";
                                    }else{
                                        echo "Kursga yoziling";
                                    }
                            @endphp
                           </h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form id="contact-form" action="{{route('appels')}}" method="post" data-toggle="validator">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="fullname" type="text" placeholder="I.F.Sh" data-error="Name is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="phone" type="text" placeholder="Telefon" data-error="Phone is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    @if (\Request::path() == 'consalting')
                                    <input type="hidden" name="type" value="consalting">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="country" type="text" placeholder="Qaysi davlat">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form --> 
                                    </div>
                                    @else
                                    <input type="hidden" name="type" value="course">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="email" type="email" placeholder="Email" data-error="Valid email is required.">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="direction" type="text" placeholder="Qaysi soha" data-error="" required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form --> 
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn">Jo`natish</button>
                                        </div> <!-- singel form -->
                                    </div> 
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                  </div> <!-- blog details -->
              </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== BLOG PART ENDS ======-->
   
@endsection