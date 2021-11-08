@extends('layouts.front')
@section('content')

<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Online test</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Asosiy sahifa</a></li>
                            <li class="breadcrumb-item"><a href="{{route('exams')}}">Online test</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$exam->title}}</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
            <div class="question bg-white p-3 border-bottom">
                <div class="d-flex flex-row justify-content-between align-items-center mcq">
                    <h3>{{$exam->title}}</h3>
                    <span>({{$exam->questions()->count()}} ta savol)</span>
                </div>
            </div>
            <div class="border">
                <form method="post" action="{{ route('check.exam', $exam->id) }}">
                    @csrf
                    <?php $i=1 ?>
                    @foreach ($exam->questions as $question)
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row align-items-center question-title">
                                <h5 class="text-danger">№:{{$i}} </h5>
                                <h5 class=" ml-2">{{$question->question}}</h5>
                            </div>
                            <div class="row">
                                @foreach($question->answers as $answer)
                                <div class="ans1 col-6">
                                    <label class="radio"> <input type="radio" name="answer[{{ $question->id }}]" value="{{$answer->id}}"> <span>{{$answer->answer}}</span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    <?php $i++; ?>
                    @endforeach
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                    <button class="btn btn-primary border-success align-items-center btn-success" type="submit">Testni yakunlash<i class="fa fa-angle-right ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
