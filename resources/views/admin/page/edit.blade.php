@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.page')}}">Page</a></li>
              <li class="breadcrumb-item active">Edit page</li>
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
	<form action="{{route('admin.page.edit', $page->id)}}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" required="required" id="title_uz" required="required" value="{{$page->title_uz}}" name="title_uz"  class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="inputDescription">Excerpt</label>
                            <textarea id="inputDescription" class="form-control" name="excerpt_uz" rows="4">{{$page->excerpt_uz}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="inputDescription">Body</label>
                            <textarea id="inputDescription" class="form-control ckeditor" required="required" name="body_uz" rows="4">{{$page->body_uz}}</textarea>
                          </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                      <div class="card-header">
                          <h3 class="card-title">Рускый язик</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="inputName">Title</label>
                            <input type="text" required="required" id="title_ru" required="required" value="{{$page->title_ru}}" name="title_ru" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="inputDescription">Excerpt</label>
                            <textarea id="inputDescription" class="form-control" name="excerpt_ru" rows="4">{{$page->excerpt_ru}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="inputDescription">Body</label>
                            <textarea id="inputDescription" class="form-control ckeditor" required="required" name="body_ru" rows="4">{{$page->body_ru}}</textarea>
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
                            <input type="text" required="required" id="title_en" required="required" value="{{$page->title_en}}" name="title_en" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="inputDescription">Excerpt</label>
                            <textarea id="inputDescription" class="form-control" name="excerpt_en" rows="4">{{$page->excerpt_en}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="inputDescription">Body</label>
                            <textarea id="inputDescription" class="form-control ckeditor" required="required" name="body_en" rows="4">{{$page->body_en}}</textarea>
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
                <div class="img"><a class=""><img src="{{\Storage::url($page->image)}}" alt=""></a></div>
                <div class="form-group row" >
                  <div class="dropzone col mt-2">
                    <div><i class="fas fa-plus"></i> <span>Photo</span></div>
                    <input type="file" name="image" id="image" class="form-control">
                    <input type="hidden" name="delete_image" id="delete_image" value="@if(!empty($page->image)) {{$page->image}} @endif">
                  </div>
                <div class="col mt-2 ">
                  <a href="#" class="btn btn-success w-100 pt-1 delete_file"><i class="fas fa-times"></i> <span>Delete</span></a>
                </div>
                </div>              
                <div class="form-group">
                  <label for="inputStatus">Slug</label>
                  <input type="text" value="{{$page->slug}}" name="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label>Template</label>
                    <select class="form-control select2" name="template" style="width: 100%;">
                      <option @if ($page->template=='default') selected="selected" @endif value="default"> -- Default -- </option>
                      <option @if ($page->template=='home') selected="selected" @endif value="home">Home</option>
                      <option @if ($page->template=='about') selected="selected" @endif value="about">About</option>
                      <option @if ($page->template=='contacts') selected="selected" @endif value="contacts">Contacts</option>
                    </select>
                </div>    
                <div class="form-group">
                    <label>Parent page</label>
                    <select class="form-control select2" name="parent_id" style="width: 100%;">
                      <option @if (is_null($page->parent_id)) selected="selected" @endif value=""> -- Choose parent -- </option>
                      @foreach ($parents as $parent)
                      <option @if ($page->parent_id==$parent->id) selected="selected" @endif value="{{$parent->id}}">{{$parent->title_uz}}</option>
                      @endforeach
                    </select>
                </div>             
                <div class="form-group">
                  <label>Position of menus</label>
                  <select class="form-control select2" name="position_menu" style="width: 100%;">
                    <option @if (is_null($page->position_menu)) selected="selected" @endif value=""> -- Default -- </option>
                    <option @if ($page->position_menu=='header') selected="selected" @endif value="header">Header</option>
                    <option @if ($page->position_menu=='footer1') selected="selected" @endif value="footer1">Footer one</option>
                    <option @if ($page->position_menu=='footer2') selected="selected" @endif value="footer2">Footer teo</option>
                  </select>
              </div>
              <div class="form-group">
                <input type="submit" value="Save page" class="btn btn-success float-right">
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