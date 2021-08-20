@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher Edit id = {{$teacher->id}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('teacher.index')}}">Teachers</a></li>
              <li class="breadcrumb-item active">Teacher Edit id = {{$teacher->id}}</li>
            </ol>
          </div>
        </div>
         @if(session('msg'))
          <div class="row justify-content-center">
            <div class="col-md-11">
              <div class="alert alert-msg" role="alert">
                {{session()->get('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          </div>
        @endif
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
	<form action="{{route('teacher.update', $teacher->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="col-md-9">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
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
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <div class="card-header">
                        <h3 class="card-title">Uzbekcha</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">O'qituvchi FISH</label>
                          <input type="text" value="{{$teacher->name_uz}}" id="name_uz" required="required" name="name_uz" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">O'qituvchi xaqida</label>
                          <textarea id="inputDescription" class="form-control" name="information_uz" rows="4">{{$teacher->information_ru}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputStatus">Status</label>
                          <input type="text" name="position_uz" class="form-control" value="{{$teacher->position_uz}}" >
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="card-header">
                        <h3 class="card-title">Рускый язик</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">O'qituvchi FISH</label>
                          <input type="text" id="name_ru" value="{{$teacher->name_ru}}" required="required" name="name_ru" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">O'qituvchi xaqida</label>
                          <textarea id="inputDescription" class="form-control" name="information_ru" rows="4">{{$teacher->information_ru}} </textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputStatus">Status</label>
                          <input type="text" name="position_ru" value="{{$teacher->position_ru}}" class="form-control">
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="card-header">
                        <h3 class="card-title">English</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">O'qituvchi FISH</label>
                          <input type="text" id="name_en" required="required" value="{{$teacher->name_en}}" name="name_en" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">O'qituvchi xaqida</label>
                          <textarea id="inputDescription" class="form-control" name="information_en" rows="4">{{$teacher->information_ru}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputStatus">Position</label>
                          <input type="text" name="position_en" value="{{$teacher->position_en}}" class="form-control">
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          <!-- /.card -->
        </div>
        <div class="col-md-3">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Foto</h3>
            </div>
            <div class="card-body">
              <div class="img"><a class=""><img src="{{\Storage::url($teacher->image)}}" alt=""></a></div>
              <div class="form-group row" >
                <div class="dropzone col mt-2">
                  <div><i class="fas fa-plus"></i> <span>Photo</span></div>
                  <input type="file" name="image" id="image" class="form-control">
                  <input type="hidden" name="delete_image" id="delete_image" value="@if(!empty($teacher->image)) {{$teacher->image}} @endif">
                </div>
                <div class="col mt-2 ">
                  <a href="#" class="btn btn-success w-100 pt-1 delete_file"><i class="fas fa-times"></i> <span>Delete</span></a>
                </div>
              </div>  
              <div class="form-group">
                <input type="submit" value="Add teacher" class="btn btn-success float-right">
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