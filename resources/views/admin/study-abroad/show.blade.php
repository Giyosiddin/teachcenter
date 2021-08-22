@extends('layouts.admin')

@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Post Detail</h3>
           <div class="card-tools">
		        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
		          <li class="nav-item">
		            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#uz" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Uz</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#ru" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">RU</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#en" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">En</a>
		          </li>
		        </ul>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12">
	    	 	 	<div class="tab-content" id="custom-tabs-one-tabContent">
	                  		<div class="tab-pane fade show active" id="uz" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
		        	 	 		<h4>{{$post->title_uz}}</h4>
			                    <div class="post">
			                      <div class="user-block">
			                        <img class="" src="{{$post->image}}" alt="">
			                      </div>
			                    </div>

			                    <div class="post clearfix">
			                      <p>
			                        {{$post->excerpt_uz}}
			                      </p>
			                    </div>

			                    <div class="post">
			                      
			                      <p>
			                       {{$post->body_uz}}
			                      </p>
		                  
		                		</div>
	                		</div>
	                  		<div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="ru">
		        	 	 		<h4>{{$post->title_ru}}</h4>
			                    <div class="post">
			                      <div class="user-block">
			                        <img class="" src="{{$post->image}}" alt="">
			                      </div>
			                    </div>

			                    <div class="post clearfix">
			                      <p>
			                        {{$post->excerpt_ru}}
			                      </p>
			                    </div>

			                    <div class="post">
			                      
			                      <p>
			                       {{$post->body_ru}}
			                      </p>
		                  
		                		</div>
	                		</div>
	                  		<div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en">
		        	 	 		<h4>{{$post->title_en}}</h4>
			                    <div class="post">
			                      <div class="user-block">
			                        <img class="" src="{{$post->image}}" alt="">
			                      </div>
			                    </div>

			                    <div class="post clearfix">
			                      <p>
			                        {{$post->excerpt_en}}
			                      </p>
			                    </div>

			                    <div class="post">
			                      
			                      <p>
			                       {{$post->body_en}}
			                      </p>
		                  
		                		</div>
	                		</div>
	                </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
              <div class="text-center mt-5 mb-3">
                <a href="{{route('study-abroad.edit', $post->id)}}" class="btn btn-sm btn-primary">Edit post</a>
                <a href="#" class="btn btn-sm btn-warning">Delete</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection