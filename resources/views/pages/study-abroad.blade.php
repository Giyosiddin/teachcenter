@extends('layouts.front')
@section('content')
     
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/images/page-banner-3.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Xorijda ta'lim</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Asosiy sahifa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Xorijda ta'lim</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== EVENTS PART START ======-->

<section id="event-page" class="pt-90 pb-120 gray-bg">
    <div class="container">
       <div class="row">
           @foreach ($posts as $post)
           <div class="col-lg-6">
                <div class="singel-event-list mt-30">
                    <div class="event-thum">
                        <img src="{{\Storage::url($post->image)}}" alt="{{$post->title_uz}}">
                    </div>
                    <div class="event-cont">
                        <!-- <span><i class="fa fa-calendar"></i> {{date('d M Y', strtotime($post->updated_at))}}</span> -->
                        <a href="{{route('in.study-abroad', $post->slug)}}"><h4>{{$post->title}}</h4></a>
                        {{-- <span><i class="fa fa-clock-o"></i> {{time('m h s', strtotime($post->updated_at))}}</span> --}}
                        {{-- <span><i class="fa fa-map-marker"></i> Rc Auditorim</span> --}}
                        <p>{{$post->excerpt_uz}}</p>
                    </div>
                </div>
            </div>
           @endforeach
       </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <nav class="courses-pagination mt-50">
                    {{$posts->links()}}
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