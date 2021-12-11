@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit user</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.users')}}">user</a></li>
              <li class="breadcrumb-item active">Edit user</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

	<form action="{{route('change.status.user', $user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="col-md-9">
            <div class="card card-primary card-tabs">
              <div class="card-body">
                <div class="content" >
                  <div class="tab-pane fade show active">
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
                      <div class="card-body">

                        <div class="form-group">
                            <p>{{ $user->name }}, <b>{{ $user->email }}</b></p>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" name="role" style="width: 100%;">
                                <option selected="selected">-- Choose Status --</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($user->roles[0]->id == $role->id) selected @endif>{{ucfirst($role->name)}}</option>
                                @endforeach
                            </select>
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
              <div class="form-group">
                <input type="submit" value="Save user" class="btn btn-success float-right">
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
