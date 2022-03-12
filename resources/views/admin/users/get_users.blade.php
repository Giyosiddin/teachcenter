@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		<h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
          <h3 class="card-title">Users</h3>

        </div>
        <div class="card-body p-0">
            <div class="">
                <div class="tab-pane fade show active" id="for-consalting" role="tabpanel" aria-labelledby="for-consalting-tab">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 30%">
                                    Name
                                </th>
                                {{-- <th style="width: 18%" class="text-center">
                                    Phone
                                </th> --}}
                                <th style="width: 20%">
                                    Email
                                </th>
                                <th style="width: 20%">
                                    Status
                                </th>
                                 <th>
                                 </th>
                                 <th>
                                 </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a>
                                        {{$user->name}}
                                    </a>
                                </td>
                                {{-- <td class="project-state">
                                    {{$user->phone}}
                                </td> --}}
                                <td>
                                    <div>
                                        <strong>{{$user->email }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @foreach ($user->roles as $role )
                                             <strong>{{$role->name}}</strong>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="project-actions ">
                                    <a class="btn btn-info btn-sm" href="{{ route('change.status.user', $user->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Change status
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.users.delete', $user->id) }}">
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
