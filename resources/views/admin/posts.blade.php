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
                        <button class="btn btn-warning btn-sm">Edit</button>
                     </a>
                     <button data-path="{{ route('posts.destroy', ["id"=> $post->id]) }}" 
                             data-title="{{ $post->title }}"
                             data-toggle="modal" 
                             data-target="#confirmDelete"
                             class="btn btn-danger btn-sm">Delete</button>
                  </td>
                </tr>                
              @endforeach
            </table>

            <div class="col-md-12 text-center">
              {!! $posts->links() !!}
            </div>
        </div>
    </div>

    @include('layouts.patials.delete-modal')
@endsection

@section("scripts")
	<script>
	    $('#confirmDelete').on('show.bs.modal', function(e) {
	        var data = $(e.relatedTarget).data();

			    $('.modal-post-title').text(data.title);
	        $('#form-deleted').attr('action', data.path);
	    });
	</script>
@endsection