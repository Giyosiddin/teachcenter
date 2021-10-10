@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Add exam</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.exams')}}">Exam</a></li>
              <li class="breadcrumb-item active">Add exam</li>
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
	  <form action="{{route('admin.exams.create')}}" method="POST" enctype="multipart/form-data">
     @csrf
      <div class="row">
        <div class="col-md-9">
            <div class="card card-primary card-tabs">
              <div class="card-body">
                <div class="tab-content" >
                  <div class="tab-pane fade show active">
                     <div class="card-header">
                        <!-- <h3 class="card-title">Uzbekcha</h3> -->
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">Title</label>
                          <input type="text" required="required" id="title" required="required" name="title" class="form-control">
                        </div>
                        {{-- <div class="form-group" id="accordion">
                            <div class="card">
                                <div class="card-header" id="heading1">
                                  <h5 class="mb-0">
                                    <button class="btn " data-toggle="collapse" data-target="#question1" aria-expanded="true" aria-controls="question1">
                                      Question
                                    </button>
                                  </h5>
                                </div>
                            
                                <div id="question1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
                                  <div class="card-body row">
                                    <div class="col-9">
                                        <label for="">Answer</label>
                                        <textarea name="answer" id="" class="form-control " rows="4"></textarea>
                                    </div>
                                    <div class="col-3">
                                        <label for="">Is Correct</label>
                                        <input type="radio" name="is_correct" id="" class="center-block">
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div> --}}
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
              <div class="form-group">
                  <label>Course</label>
                  <select class="form-control select2" name="course_id" style="width: 100%;">
                    <option selected="selected" value="">-- Choose Course --</option>
                    @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->translation->title}}</option>
                    @endforeach
                  </select>
              </div>                
              <div class="form-group">
                <input type="submit" value="Add exam" class="btn btn-success float-right">
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