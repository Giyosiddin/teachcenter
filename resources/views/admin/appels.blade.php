@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		<h1>Appels</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Appels</li>
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
          <h3 class="card-title">Appels</h3>

          <div class="card-tools">
            <ul class="nav nav-tabs" id="for-course-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="for-consalting-tab" data-toggle="pill" href="#for-consalting" role="tab" aria-controls="for-consalting" aria-selected="true">For consaltiong</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="for-course-tab" data-toggle="pill" href="#for-course" role="tab" aria-controls="for-course" aria-selected="false">For course</a>
                </li>
              </ul>
          </div>
        </div>
        <div class="card-body p-0">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="for-consalting" role="tabpanel" aria-labelledby="for-consalting-tab">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Full name
                                </th>
                                <th style="width: 18%" class="text-center">
                                    Phone
                                </th>
                                <th style="width: 20%">
                                    Country
                                </th>
                                <th style="width: 20%">
                                    Message
                                </th>
                                <th>
                                   Direction
                                </th>                                
                                <th>
                                    Date
                                 </th>                                                               
                                 <th>
                                 </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appels_consalting as $appel)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a>
                                        {{$appel->fullname}}
                                    </a>
                                </td>
                                <td class="project-state">
                                    {{$appel->phone}}
                                </td>
                                <td>
                                    <div>
                                        <strong>{{$appel->country }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <strong>{{$appel->message }}</strong>
                                    </div>
                                </td>
                                <td class="project_progress">
                                    <p style="max-width: 500px">
                                    {{$appel->direction}}
                                    </p>
                                </td>
                                <td class="project-actions ">
                                    Created {{$appel->created_at}}
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{route('admin.appels.delete', $appel->id)}}">
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
                <div class="tab-pane fade" id="for-course" role="tabpanel" aria-labelledby="for-course-tab">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Full name
                                </th>
                                <th style="width: 18%" class="text-center">
                                    Phone
                                </th>
                                <th style="width: 20%">
                                    Email
                                </th>
                                <th>
                                   Direction
                                </th>                                
                                <th>
                                    Date
                                 </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appels_course as $appel_course)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a>
                                        {{$appel_course->fullname}}
                                    </a>
                                </td>
                                <td class="project-state">
                                    {{$appel_course->phone}}
                                </td>
                                <td>
                                    <div>
                                        <strong>{{$appel_course->email }}</strong>
                                    </div>
                                </td>
                                <td class="project_progress">
                                    <p style="max-width: 500px">
                                    {{$appel_course->direction}}
                                    </p>
                                </td>
                                <td class="project-actions">
                                    Created {{$appel_course->created_at}}
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{route('admin.appels.delete', $appel_course->id)}}">
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