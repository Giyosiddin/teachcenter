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
                           </ul>
                           @php
                               echo $page->body_uz;
                           @endphp
                      </div> <!-- cont -->
                  </div> <!-- blog details -->
              </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== BLOG PART ENDS ======-->
   
@endsection