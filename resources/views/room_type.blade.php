@extends('layouts.app')

@section('title')
Room Types
@endsection

@section('content')

   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Room Type</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Room Type</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      
      {{-- @if ($posts->count())
      @foreach ($posts as $post)
      <p>{{$post}}</p>
      @endforeach --}}

  {{-- @else
      <p>There are no posts</p>
  @endif --}}

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
