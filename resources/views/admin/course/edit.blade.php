@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit course</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('course.index')}}">Course</a></li>
              <li class="breadcrumb-item active">Edit course</li>
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
	  <form action="{{route('course.edit', $course->id)}}" method="POST">
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
                          <input type="text" required="required" value="{{$course->translation->title}}" id="title" required="required" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">Description</label>
                          <textarea id="inputDescription" class="form-control" name="description" rows="4">{{$course->translation->description}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputBody">Body</label>
                          <textarea id="inputBody" class="form-control ckeditor" name="body" rows="4">{{$course->translation->body}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputDetails">Details</label>
                          <textarea id="inputDetails" class="form-control ckeditor" name="details" rows="4">{{$course->translation->details}}</textarea>
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
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Photo</label>
                <input type="file" name="image" id="inputEstimatedBudget" class="form-control">
              </div>              
              <div class="form-group">
                  <label>Teacher</label>
                  <select class="form-control select2" name="teacher_id" style="width: 100%;">
                    <option selected="selected">-- Choose teacher --</option>
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}" @if($course->teacher_id == $teacher->id) selected @endif>{{$teacher->name_uz}}</option>
                    @endforeach
                  </select>
              </div>                   
              <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2" name="category_id" style="width: 100%;">
                    <option selected="selected">-- Choose category --</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($course->category_id == $category->id) selected @endif>{{$category->title_uz}}</option>
                    @endforeach
                  </select>
              </div>              
              <div class="form-group">
                  <label>Language</label>
                  <select class="form-control select2" name="locale" style="width: 100%;">
                    <option selected="selected"> -- Choose language -- </option>
                    <option value="uz" @if($course->translation->locale == 'uz') selected @endif>Uz</option>
                    <option value="ru" @if($course->translation->locale == 'ru') selected @endif>Ru</option>
                    <option value="en" @if($course->translation->locale == 'en') selected @endif>En</option>
                  </select>
              </div>              
              <div class="form-group">
                <input type="submit" value="Add category" class="btn btn-success float-right">
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