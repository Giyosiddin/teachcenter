@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		<h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
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
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Courses</h3>

          <div class="card-tools">
            <a href="{{route('course.create')}}" class="btn btn-block btn-success btn-flat"> Add Course</a>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                         Course name
                      </th>
                      <th style="width: 20%">
                          Description
                      </th>
                      <th>
                          Category
                      </th>
                      <th style="width: 20%">
                          Teacher
                      </th>
                      <th>
                          Photo
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($courses as $course)
                 
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              {{$course->translation->title}}
                          </a>
                          <br/>
                          <small>
                              Created {{$course->created_at}}
                          </small>
                      </td>
                      <td class="project_progress">
                          <p>
                             {{$course->translation->description}}
                          </p>
                      </td>
                      <td class="project-state">
                        @if($course->category)
                          <p>{{$course->category->title_uz}}</p>
                        @endif
                      </td>
                      <td class="project_progress">
                          <p>
                            @if($course->teacher)
                             {{$course->teacher->name_uz}}
                            @endif
                          </p>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">Success</span>
                      </td>
                      <td class="project-actions text-right">
                          {{-- <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> --}}
                          <a class="btn btn-info btn-sm" href="{{route('course.edit', $course->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('course.delete', $course->id)}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection