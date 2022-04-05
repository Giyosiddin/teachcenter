@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		<h1>Lessons of course - №{{request('course')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('course.index')}}">Courses</a></li>
              <li class="breadcrumb-item active">Lessons</li>
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
          <h3 class="card-title">Lessons</h3>

          <div class="card-tools">
            <a href="{{route('lesson.add')}}" class="btn btn-block btn-success btn-flat"> Add lesson</a>
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
                         lesson name
                      </th>
                      <th style="width: 30%">
                          Description
                      </th>
                      <th>
                          Course
                      </th>
                      <th style="width: 30%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($lessons as $lesson)

                  <tr>
                      <td>
                          #{{$lesson->id}}
                      </td>
                      <td>
                          <a>
                              {{$lesson->translation->title}}
                          </a>
                          <br/>
                          <small>
                              Created {{$lesson->created_at}}
                          </small>
                      </td>
                      <td class="project_progress">
                          <p>
                             {{$lesson->translation->description}}
                          </p>
                      </td>
                      <td class="project-state">
                          <p>{{$lesson->course->translation->title}}</p>
                      </td>
                     {{-- <td class="project-state">
                         <img src="{{\Storage::url($lesson->image)}}" alt="" width="100px">
                      </td> --}}
                      <td class="project-actions text-right">
                          {{-- <a class="btn btn-primary btn-sm" href="{{route('lesson.show', $lesson->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> --}}
                          <a class="btn btn-info btn-sm" href="{{route('lesson.edit', $lesson->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('lesson.delete', $lesson->id)}}">
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
        <div class="d-flex justify-content-center">
           {!! $lessons->links('vendor.pagination') !!}
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
