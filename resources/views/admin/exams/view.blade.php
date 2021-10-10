@extends('layouts.admin')

@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Exam Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.exams')}}">Exams</a></li>
              <li class="breadcrumb-item active">Exam Detail</li>
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
          <h3 class="card-title">Exam Detail</h3>
           {{-- <div class="card-tools">
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
          </div> --}}
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="">{{$exam->title}}</h4>

                        <div class="card-tools">
                          <a href="{{route('admin.create.question',$exam->id)}}" class="btn btn-block btn-success btn-flat"> Add question</a>
                        </div>
                      </div>
                    <div class="card-header">
                        <h3 class="card-title">Expandable Table Tree</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body p-0">
                        <table class="table table-hover">
                            <tbody><?php $i = 1; ?>
                            @foreach($exam->questions as $question)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td scope="col">
                                        <span>№: {{$i}}</span>
                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                        {{$question->question}}
                                    </td>
                                    
                                    <td scope="col" class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{route('admin.question.edit',[$exam->id, $question->id])}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{route('admin.question.delete', $question->id)}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td colspan="2"  scope="col">
                                        <div class="p-0">
                                        <table class="table table-hover">
                                            <tbody>
                                            @foreach($question->answers as $answer)
                                                <tr>
                                                    <td>{{$answer->answer}}</td>
                                                    <td>@if ($answer->is_correct == 1)
                                                        <span class="badge bg-primary">True</span>
                                                    @else
                                                        <span class="badge bg-danger">False</span>
                                                    @endif</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
              <div class="text-center mt-5 mb-3">
                <a href="{{route('admin.exams.update', $exam->id)}}" class="btn btn-sm btn-primary">Edit exam</a>
                <a href="{{route('exam.delete', $exam->id)}}" class="btn btn-sm btn-warning">Delete</a>
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