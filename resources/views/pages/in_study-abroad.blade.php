@extends('layouts.front')
@section('content')
    
    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{asset('front/images/consulting.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{$post->title_uz}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Asosiy sahifa</a></li>
                                <li class="breadcrumb-item"><a href="{{route('study-abroad')}}">Xorijda ta'lim</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$post->title_uz}}</li>
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
              <div class="col-lg-8">
                  <div class="blog-details mt-30">
                      <div class="thum">
                          <img src="{{\Storage::url($post->image)}}" alt="Blog Details" width="100%">
                      </div>
                      <div class="cont">
                          <h3>{{$post->title_uz}}</h3>
                          <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i> {{date('d M Y', strtotime($post->updated_at))}}</a></li>
                               {{-- <li><a href="#"><i class="fa fa-user"></i>Mark anthem</a></li>
                               <li><a href="#"><i class="fa fa-tags"></i>Education</a></li> --}}
                           </ul>
                           @php
                               echo $post->body_uz;
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
                  </div> <!-- blog details -->
              </div>
               <div class="col-lg-4">
                   <div class="saidbar">
                       <div class="row">
                           <div class="col-lg-12 col-md-6">
                               {{-- <div class="saidbar-search mt-30">
                                   <form action="#">
                                       <input type="text" placeholder="Search">
                                       <button type="button"><i class="fa fa-search"></i></button>
                                   </form>
                               </div> <!-- saidbar search --> --}}
                               {{-- <div class="categories mt-30">
                                   <h4>Categories</h4>
                                   <ul>
                                       <li><a href="#">Fronted</a></li>
                                       <li><a href="#">Backend</a></li>
                                       <li><a href="#">Photography</a></li>
                                       <li><a href="#">Teachnology</a></li>
                                       <li><a href="#">GMET</a></li>
                                       <li><a href="#">Language</a></li>
                                       <li><a href="#">Science</a></li>
                                       <li><a href="#">Accounting</a></li>
                                   </ul>
                               </div> --}}
                           </div> <!-- categories -->
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-post mt-30">
                                   <h4>Xorijda ta'lim</h4>
                                   <ul>
                                       @foreach ($news as $item)
                                       <li>
                                            <a href="{{route('in.study-abroad',$item->slug)}}">
                                                <div class="singel-post">
                                                   <div class="thum" style="float: inherit;padding-bottom: 20px;">
                                                       <img src="{{\Storage::url($item->image)}}" width="100%" alt="Blog">
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
                       </div> <!-- row -->
                   </div> <!-- saidbar -->
               </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== BLOG PART ENDS ======-->
   
@endsection