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
                            <li class="breadcrumb-item active" aria-current="page">Test natijasi</li>
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
                    <h3>{{ \Str::title(\Auth::user()->name) }}ning test natijasi</h3>
                    {{-- <span>({{$result->exam->questions()->count()}} ta savol)</span> --}}
                </div>
            </div>
            <div class="border">
               <table class="table">
                    <thead>
                        <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">Test nomi</th>
                        <th scope="col">Savollar soni</th>
                        <th scope="col">To'g'ri javoblar soni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- <th scope="row">1</th> --}}
                            <td>{{ $result->exam->title }}</td>
                            <td>{{ $result->exam->questions()->count() }}</td>
                            <td>{{ $result->total_points }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
