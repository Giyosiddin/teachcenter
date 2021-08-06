@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit lesson</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('lesson.index')}}">Lesson</a></li>
              <li class="breadcrumb-item active">Edit lesson</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
  <section class="content">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('msg'))
        <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success" role="alert">
            {{session()->get('msg')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
        </div>
    @endif
	  <form action="{{route('lesson.edit', $lesson->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
      <div class="row">
        <div class="col-md-9">
            <div class="card card-primary card-tabs">
              <!-- <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Uz</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">RU</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">En</a>
                  </li>
                </ul>
              </div> -->
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <div class="card-header">
                        <!-- <h3 class="card-title">Uzbekcha</h3> -->
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">Title</label>
                          <input type="text" required="required" value="{{$lesson->translation->title}}" id="title" required="required" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">Description</label>
                          <textarea id="inputDescription" class="form-control" name="description" rows="4">{{$lesson->translation->description}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputBody">Body</label>
                          <textarea id="inputBody" class="form-control ckeditor" name="body" rows="4">{{$lesson->translation->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="video">Video link</label>
                            <input type="text" required="required" id="video" required="required" name="video" value="{{$lesson->video}}" class="form-control">
                          </div>
                      </div>
                  </div>
                <!--   <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="card-header">
                        <h3 class="card-title">Рускый язик</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">Title</label>
                          <input type="text" required="required" id="title_ru" required="required" name="title_ru" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">Excerpt</label>
                          <textarea id="inputDescription" class="form-control" name="excerpt_ru" rows="4"></textarea>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="card-header">
                        <h3 class="card-title">English</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">Title</label>
                          <input type="text" required="required" id="title_en" required="required" name="title_en" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">Excerpt</label>
                          <textarea id="inputDescription" class="form-control" name="excerpt_en" rows="4"></textarea>
                        </div>
                      </div>
                  </div> -->
                </div>
              </div>
              <!-- /.card -->
            </div>
          <!-- /.card -->
        </div>
        <div class="col-md-3">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Others</h3>
            </div>
            <div class="card-body container">
              <div class="img"><a class=""><img src="{{\Storage::url($lesson->image)}}" alt=""></a></div>
              <div class="form-group row" >
                <div class="dropzone col mt-2">
                  <div><i class="fas fa-plus"></i> <span>Photo</span></div>
                  <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col mt-2 ">
                  <a href="#" class="btn btn-success w-100 pt-1 file"><i class="fas fa-times"></i> <span>Delete</span></a>
                  {{-- <input type="file" name="image" id="image" class="form-control"> --}}
                </div>
              </div>
              <div class="img">@if(!empty($lesson->file_first)) <a class="file_name"><i class="fas fa-file"></i>
              <span>{{basename(\Storage::url($lesson->file_first))}}</span></a>  @endif</div>
              <div class="form-group row">
                <div class="dropzone col mt-2"> <div><i class="fas fa-plus"></i> First file</div>
                <input type="file" name="file_first" id="file_first" class="form-control"></div>
                <div class="col mt-2 ">
                  <a href="#" class="btn btn-success w-100 pt-1 file"><i class="fas fa-times"></i><span>Delete</span></a>
                </div>
              </div>              
              <div class="img">@if(!empty($lesson->file_second)) <a  class="file_name"><i class="fas fa-file"></i>
                <span>{{basename(\Storage::url($lesson->file_second))}}</span></a>  @endif</div>
              <div class="form-group row">
                <div class="dropzone col mt-2 ">
                  <div><i class="fas fa-plus"></i> Second file</div>
                  <input type="file" name="file_second" value="{{\Storage::path($lesson->file_second)}}" id="file_second" class="form-control">
                </div>                
                <div class="col mt-2 ">
                  <a href="#" class="btn btn-success w-100 pt-1 file"><i class="fas fa-times"></i><span>Delete</span></a>
                </div>
              </div>                            
              <div class="form-group">
                <label for="timeVideo">Time video</label>
                <input type="text" name="time" id="timeVideo" value="{{$lesson->time}}" class="form-control">
              </div>                            
              {{-- <div class="form-group">
                  <label>Teacher</label>
                  <select class="form-control select2" name="teacher_id" style="width: 100%;">
                    <option selected="selected">-- Choose teacher --</option>
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->name_uz}}</option>
                    @endforeach
                  </select>
              </div>                    --}}
              <div class="form-group">
                  <label>Course</label>
                  <select class="form-control select2" name="course_id" style="width: 100%;">
                    <option selected="selected">-- Choose course --</option>
                    @foreach($courses as $course)
                    <option value="{{$course->id}}" @if($lesson->course_id == $course->id) selected @endif>{{$course->translation->title}}</option>
                    @endforeach
                  </select>
              </div>              
              <div class="form-group">
                  <label>Language</label>
                  <select class="form-control select2" name="locale" style="width: 100%;">
                    <option selected="selected"> -- Choose language -- </option>
                    <option value="uz" @if($lesson->translation->locale == 'uz') selected @endif>Uz</option>
                    <option value="ru" @if($lesson->translation->locale == 'ru') selected @endif>Ru</option>
                    <option value="en" @if($lesson->translation->locale == 'en') selected @endif>En</option>
                  </select>
              </div>              
              <div class="form-group">
                <input type="submit" value="Save lesson" class="btn btn-success float-right">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection