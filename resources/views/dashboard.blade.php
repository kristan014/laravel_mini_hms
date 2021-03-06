@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

         <p>
        {{\Session::get('tokenVariable');}}
           </p>
          
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

<script>
  var tokendd = "{{ Session::get('tokenVariable'); }}"

  console.log(tokendd)
</script>
@endsection