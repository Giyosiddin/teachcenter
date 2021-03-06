@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Add page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.page')}}">Page</a></li>
              <li class="breadcrumb-item active">Add page</li>
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
	<form action="{{route('admin.page.create')}}" method="POST" enctype="multipart/form-data">
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
                          <label for="inputName">Title</label>
                          <input type="text" required="required" id="title_uz" required="required" name="title_uz" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">Excerpt</label>
                          <textarea id="inputDescription" class="form-control" name="excerpt_uz" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">Body</label>
                          <textarea id="inputDescription" class="form-control ckeditor" name="body_uz" rows="4"></textarea>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="card-header">
                        <h3 class="card-title">???????????? ????????</h3>
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
                        <div class="form-group">
                          <label for="inputDescription">Body</label>
                          <textarea id="inputDescription" class="form-control ckeditor" name="body_ru" rows="4"></textarea>
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
                        <div class="form-group">
                          <label for="inputDescription">Body</label>
                          <textarea id="inputDescription" class="form-control ckeditor" name="body_en" rows="4"></textarea>
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
              <h3 class="card-title">Others</h3>
            </div>
            <div class="card-body">
              <div class="img"><a class=""><img src="" alt=""></a></div>
              <div class="form-group row" >
                <div class="dropzone col mt-2">
                  <div><i class="fas fa-plus"></i> <span>Photo</span></div>
                  <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col mt-2 ">
                  <a href="#" class="btn btn-success w-100 pt-1 delete_file"><i class="fas fa-times"></i> <span>Delete</span></a>
                </div>
                </div>              
                {{-- <div class="form-group">
                  <label for="inputStatus">Slug</label>
                  <input type="text" name="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label>Template</label>
                    <select class="form-control select2" name="template" style="width: 100%;">
                      <option selected="selected" value="default"> -- Default -- </option>
                      <option value="home">Home</option>
                      <option value="about">About</option>
                      <option value="contacts">Contacts</option>
                      <option value="form-page">Form page</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>Parent page</label>
                  <select class="form-control select2" name="parent_id" style="width: 100%;">
                    <option value=""> -- Choose parent -- </option>
                    @foreach ($parents as $parent)
                    <option value="{{$parent->id}}">{{$parent->title_uz}}</option>
                    @endforeach
                  </select>
                </div>             
                <div class="form-group">
                  <label>Position of menus</label>
                  <select class="form-control select2" name="position_menu" style="width: 100%;">
                    <option value=""> -- Default -- </option>
                    <option value="header">Header</option>
                    <option value="footer1">Footer one</option>
                    <option value="footer2">Footer teo</option>
                  </select>
                </div> --}}
                <div class="form-group">
                  <input type="submit" value="Add page" class="btn btn-success float-right">
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