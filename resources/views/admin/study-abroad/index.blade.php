@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		<h1>Study abroad</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Study abroad</li>
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
          <h3 class="card-title">Study abroad</h3>

          <div class="card-tools">
            <a href="{{route('study-abroad.add')}}" class="btn btn-block btn-success btn-flat"> Add post</a>
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
                         Post name
                      </th>
                      <th style="width: 18%" class="text-center">
                          Slug
                      </th>
                      <th style="width: 20%">
                          Excerpt
                      </th>
                      <th>
                          Photo
                      </th>                      
                      <th>
                        Slider
                    </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($posts as $post)
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              {{$post->title_uz}}
                          </a>
                          <br/>
                          <small>
                              Created {{$post->created_at}}
                          </small>
                      </td>
                      <td>
                          <div>
                              <strong>{{$post->slug }}</strong>
                          </div>
                      </td>
                      <td class="project_progress">
                          <p style="max-width: 500px">
                             {{$post->excerpt_uz}}
                          </p>
                      </td>
                      <td class="project-state">
                          <img src="{{\Storage::url($post->image)}}" width="200px" alt="">
                      </td>
                      <td>
                        @if($post->for_slider=='1')
                        <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-times" aria-hidden="true"></i>
                        @endif
                      </td>
                      <td class="project-actions text-right">
                          {{-- <a class="btn btn-primary btn-sm" href="{{route('study-abroad.show', $post->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> --}}
                          <a class="btn btn-info btn-sm" href="{{route('study-abroad.edit', $post->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('study-abroad.delete', $post->id)}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{$posts->links()}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection