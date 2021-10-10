@extends('layouts.admin')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		<h1>Exams</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Exams</li>
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
          <h3 class="card-title">Exams</h3>

          <div class="card-tools">
            <a href="{{route('admin.exams.create')}}" class="btn btn-block btn-success btn-flat"> Add Exam</a>
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
                         Exam name
                      </th>
                      <th style="width: 20%">
                          Course
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($exams as $exam)
                 {{-- {{dd($exam)}} --}}
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              {{$exam->title}}
                          </a>
                      </td>
                      <td class="project_progress">
                          <p>
                             {{$exam->course->translation->title}}
                          </p>
                      </td>
                      <td class="project-actions text-right">
                         <a class="btn btn-primary btn-sm" href="{{route('admin.exams.view', $exam->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> 
                          <a class="btn btn-info btn-sm" href="{{route('admin.exams.update', $exam->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('exam.delete', $exam->id)}}">
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
        {{$exams->links('vendor.pagination')}}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection