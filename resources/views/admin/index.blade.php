@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('layouts.patials.admin-sidebar');
        </div>
        <div class="card col-md-9">
            <h1>Dashboard</h1>

            <div class="col-md-4">
                <div class="panel panel-danger">
                 <div class="panel-heading">
                    <h3 class="panel-title">Posts in Review</h3>
                  </div>
                  <div class="panel-body">
                    <h1 class="pull-right">{{$postInReview}}</h1>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-success">
                 <div class="panel-heading">
                    <h3 class="panel-title">Published Posts</h3>
                  </div>
                  <div class="panel-body">
                    <h1 class="pull-right">{{$postPublished}}</h1>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-primary">
                 <div class="panel-heading">
                    <h3 class="panel-title">Tags</h3>
                  </div>
                  <div class="panel-body">
                    <h1 class="pull-right">{{ $tagCount }}</h1>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
