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
@endsection
