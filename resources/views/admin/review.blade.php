@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('layouts.patials.admin-sidebar');
        </div>
        <div class="card col-md-9">
            <h1>Review Posts</h1>

            @if($posts->count() > 0)
              <table class="table table-striped">
                <tr>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
                @foreach($posts as $post)
                  <tr>
                    <td class="col-sm-8">{{ $post->title }}</td>
                    <td class="col-sm-4">
                      <form class="inline-block" action="{{ route('posts.review', ["id"=> $post->id]) }}" method="post">
                        {{ csrf_field() }}
                        <button class="btn btn-success btn-sm">Publish</button>
                      </form>
                       <form class="inline-block" action="{{ route('posts.cancel', ["id"=> $post->id]) }}" method="post">
                           {{ csrf_field() }}
                           <button class="btn btn-warning btn-sm">Cancel</button>
                       </form>
                    </td>
                  </tr>
                @endforeach
              </table>
            @else
              <h4 class="text-center margin-up-3">No Posts in Review</h4>
            @endif

            <div class="col-md-12 text-center">
              {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection