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
@endsection
