@extends('layouts.app')

@section('content')
	<div class="col-md-8">
		@foreach ($posts as $post)
			<div class="card clearfix">
				<div class="manage-button pull-right">
					<div class="row">
						<div class="col-md-6">
							<a href="{{ route('posts.edit', ['post' => $post])}}"><button class="btn btn-warning btn-sm">Edit</button></a>
						</div>
						<div class="col-md-6">
							<button data-path="{{ route('posts.destroy', ["id"=> $post->id]) }}" 
                             data-title="{{ $post->title }}"
                             data-toggle="modal" 
                             data-target="#confirmDelete"
                             class="btn btn-danger btn-sm">Delete</button>
						</div>
					</div>
				</div>
				<h2 class="title"><a href="">{{ $post->title }}</a></h2>
						
				<div class="meta">
					<span>by <a href="#">{{ $post->user->username }}</a></span> -
					<span>{{ $post->created_at->format('d M Y') }}</span> -
					<span>Tags: </span>
					@foreach($post->tags as $tag)
						<a href="{{ url('/tags/'. $tag->id)}}"><span>{{ $tag->name }}</span></a>
					@endforeach
				</div>
				<p class="content">{{ substr(strip_tags($post->content), 0, 300) }}</p>

				<div class="pull-left">
					<form class="inline-block" action="{{ route('posts.like', ["id" => $post->id]) }}" method="post">
						@if (Auth::guest())
							<span class="like-button glyphicon glyphicon-heart-empty"></span>
						@else
							<span class="like-button glyphicon 
							glyphicon-heart{{ $post->isLiked(Auth::user()) ? '' : '-empty'}}"></span>
						@endif
						
						<span class="likes-count">{{ $post->getLikes() }}</span>
						{{ csrf_field() }}
					</form>

					<div class="comments-count inline-block">
						<span class="glyphicon glyphicon-comment"></span>
						<span>{{ $post->comments()->count() }}</span>
					</div>
				</div>
			</div>
		@endforeach
		
		@if(count($posts) < 1)
			<h3 class="text-center">No posts to show</h3>
		@endif
	</div>

	@include('layouts.patials.sidebar')

	<div class="col-md-12 text-center">
		{!! $posts->links() !!}
	</div>

	<!-- Delete Modal -->
	<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
	 	<form id="form-deleted" action="#" method="post">
		    {{ csrf_field() }}
		    {{ method_field('DELETE')}}

		    <div class="modal-dialog" role="document">
		      	<div class="modal-content">
		        	<div class="modal-header">
		          		<button type="button" class="close" 
		          				data-dismiss="modal" aria-label="Close">
		          				<span aria-hidden="true">&times;</span>
		          		</button>
		          		<h4 class="modal-title" id="deleteLabel">Delete?</h4>
		        	</div>
			        <div class="modal-body">
			          <b>This is permanent delete.</b> 
			          Are you sure you want to delete 
			        </div>
		        	<div class="modal-footer">
		          		<button type="button" class="btn btn-default" 
		          				data-dismiss="modal">Cancel
		          		</button>
		          		<button type="submit" class="btn btn-primary">
		          			Delete
		          		</button>
		        	</div>	
		      	</div>
		    </div>
	  	</form>
	</div>
@endsection

@section("scripts")
	<script src="js/like.js"></script>
	<script>
	    $('#confirmDelete').on('show.bs.modal', function(e) {
	        var data = $(e.relatedTarget).data();

	        $('.modal-body', this).append('<b>' + data.title + '</b> ?');
	        $('#form-deleted').attr('action', data.path);
	    });
	</script>
@endsection