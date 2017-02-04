@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('layouts.patials.admin-sidebar');
        </div>
        <div class="card col-md-9">
            <h1>Posts</h1>

            <table class="table table-striped">
              <tr>
                <th>Title</th>
                <th>Action</th>
              </tr>
              @foreach($posts as $post)
                <tr>
                  <td class="col-sm-8">{{ $post->title }}</td>
                  <td class="col-sm-4">
                     <a href="{{ route('posts.edit', ["id"=> $post->id]) }}">
                        <button class="btn btn-success btn-sm">Edit</button>
                     </a>
                     <form class="inline-block" action="{{ route('posts.destroy', ["id"=> $post->id]) }}" method="post">
                         {{ csrf_field() }}
                          <input type="hidden" name="_method" value="delete"/>
                         <button class="btn btn-warning btn-sm">Delete</button>
                     </form>
                  </td>
                </tr>
              @endforeach
            </table>

            <div class="col-md-12 text-center">
              {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection