@extends('layouts.app')

@section('content')
	<div class="card clearfix">
		<h2 class="title"><a href="">{{ $post->title }}</a></h2>
		<div class="meta">
			<span>by <a href="#">{{ $post->user->username }}</a></span> -
			<span>{{ $post->created_at->format('d M Y') }}</span>
		</div>
		<p class="content">{!! $post->content !!}</p>

		<div class="pull-left">
			<span>Likes 147</span>
			<span>Comments 3</span>
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
@endsection
