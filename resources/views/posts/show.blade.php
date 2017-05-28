@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-8">
		<div class="post card clearfix">
			<h2 class="title"><a href="">{{ $post->title }}</a></h2>
			<div class="meta">
				<span>by <a href="#">{{ $post->user->username }}</a></span> -
				<span>{{ $post->created_at->format('d M Y') }}</span>
			</div>
			<p class="content">{!! $post->content !!}</p>

			<div class="pull-left">
				<form class="inline-block" action="{{ route('posts.like', ["id" => $post->id]) }}" method="post">
					@if (Auth::guest())
						<span class="like-button glyphicon glyphicon-heart-empty"></span>
					@else
						<span class="like-button glyphicon glyphicon-heart{{ $post->isLiked(Auth::user()) ? '' : '-empty'}}"></span>
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
		
		 @if (Auth::user())
			<div class="card clearfix">
				<h4>Comments</h4>
				<form action="{{ url('/comments') }}" method="post" class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
					{{ csrf_field() }}

					<input type="hidden" name="post_id" value={{ $post->id }} />
					<textarea class="form-control" name="content" placeholder="Write a comment..."></textarea><br/>
					<button type="submit" class="btn btn-primary pull-right">Publish</button>

				    @if ($errors->has('content'))
		                <span class="help-block">
		                    <strong>{{ $errors->first('content') }}</strong>
		                </span>
		            @endif
				</form>
			</div>
		@endif

		<div class="margin-up-2">
			@if($post->comments()->count() > 0)
				@foreach($post->comments as $comment)
					<div class="card clearfix">
						@if (!Auth::guest() && (Auth::user()->isAdmin() || Auth::user()->hasAuthority($comment)))
						    <button data-path="{{ route('comments.destroy', ["id"=> $comment->id]) }}" 
						    		data-title="{{ substr($comment->content, 0, 30) }}" 
						    		data-toggle="modal" 
						    		data-target="#confirmDelete"
						    		class="btn btn-danger btn-sm pull-right margin-up-1" >Delete</button>
						@endif

						<div class="margin-up-1">
							<img src="{{ $comment->user->getAvatarUrl() }}" />
							<span>{{ $comment->user->username }}</span><br/>
						</div>

						<p class="margin-up-1">{{ $comment->content }}</p>
					</div>
				@endforeach
			@else
				<h4 class="text-center">No comments</h4>
			@endif
		</div>
	</div>

	@include('layouts.patials.sidebar')
</div>
@endsection

@section("scripts")
	<script src="../js/like.js"></script>
@endsection