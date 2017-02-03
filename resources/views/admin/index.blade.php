@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('layouts.patials.admin-sidebar');
        </div>
        <div class="col-md-9">
            <h1>Dashboard</h1>

            <div class="col-md-4">
                <div class="panel panel-default">
                 <div class="panel-heading">
                    <h3 class="panel-title">Posts</h3>
                  </div>
                  <div class="panel-body">
                    <h1 class="pull-right">{{ $postCount }}</h1>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
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
