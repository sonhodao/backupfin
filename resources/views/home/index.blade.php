@extends('layouts.app')

@section('page-title', __('Dashboard'))

@section('content')
<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="far fa-newspaper"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">{{__('Posts')}}</span>
            <span class="info-box-number">{{$countPost}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">{{__('Users')}}</span>
            <span class="info-box-number">{{$countUser}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <!-- Left col -->
      <div class="col-12">
        @include('home.recently_added_posts')
      </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!--/. container-fluid -->
@endsection
