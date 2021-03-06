@extends('layouts.front')
@section('content')
     
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/images/page-banner-1.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Biz haqimizda</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Asosiy sahifa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Biz haqimizda</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<section id="about-page" class="pt-70 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>Biz haqimizda</h5>
                    <h2>Class education </h2>
                </div> <!-- section title -->
                <div class="about-cont">
                    @php
                        echo $page->body_uz;
                    @endphp
                </div>
            </div> <!-- about cont -->
            <div class="col-lg-7">
                <div class="about-image mt-50">
                    <img src="{{\Storage::url($page->image)}}" alt="About">
                </div>  <!-- about imag -->
            </div> 
        </div> <!-- row -->
        <div class="about-items pt-60">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="about-singel-items mt-30">
                        <span>01</span>
                        <h4>Bizning maqsadimiz</h4>
                        <p>Barchaga birdek samarali yordam.</p>
                    </div> <!-- about singel -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="about-singel-items mt-30">
                        <span>02</span>
                       <h4>Bizning afzalliklar</h4>
                        <p>Universitetga kirishingiz yo'lidagi barcha muammolaringizning yechimi bitta joyda. </p>
                    </div> <!-- about singel -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="about-singel-items mt-30">
                        <span>03</span>
                        <h4>Bizning natijalar</h4>
                        <p>Shartnomaga amal qilib o'qiganlarning kamida 97% har yili talaba bo'ladi.
                            Xorijdan o'qishini ko'chirish bo'yicha tayyorlanganlarning 98% muvaffaqiyatga erishdi (2021)</p>
                    </div> <!-- about singel -->
                </div>
            </div> <!-- row -->
        </div> <!-- about items -->
    </div> <!-- container -->
</section>
<div id="counter-part" class="bg_cover pt-65 pb-110" data-overlay="8" style="background-image: url({{asset('front/images/bg-2.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">30</span>+</span>
                    <p>Yo'nalishlar</p>
                </div> <!-- singel counter -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">41</span>+</span>
                    <p>Tinglovchilar soni</p>
                </div> <!-- singel counter -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">11</span>+</span>
                    <p>Sertifikat olganlar soni</p>
                </div> <!-- singel counter -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">39</span>+</span>
                    <p>Konsalting xizmatidan foydalanganlar soni</p>
                </div> <!-- singel counter -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>
  <section id="teachers-part" class="pt-65 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50 pb-35">
                    <h5>O'qituvchilar</h5>
                    <h2>Bizning o'qituvchilar haqida ma'lumot</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            @foreach ($teachers as $teacher)
            <div class="col-lg-3 col-sm-6">
                <div class="singel-teachers mt-30 text-center">
                    <div class="image">
                        <img src="{{\Storage::url($teacher->image)}}" alt="Teachers">
                    </div>
                    <div class="cont">
                        <a href="teachers-singel.html"><h6>{{$teacher->name_uz}}</h6></a>
                                    <span>{{$teacher->position_uz}}</span>
                    </div>
                </div> <!-- singel teachers -->
            </div>
            @endforeach
        </div> <!-- row -->
    </div> <!-- container -->
</section>

@endsection