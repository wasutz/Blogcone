@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8">
		@foreach ($posts as $post)
			<div class="post card clearfix">
				<h2 class="title"><a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->title }}</a></h2>
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

				@if(strlen($post->content) > 300)
					<a href="{{ url('/posts/'. $post->id )}}">
						<button class="btn btn-primary pull-right">Readmore</button>
					</a>
				@endif
			</div>
		@endforeach
	</div>
	
	@include('layouts.patials.sidebar')
    	
	<div class="col-md-12 text-center">
		{!! $posts->links() !!}
	</div>
</div>
@endsection

@section("scripts")
	<script src="js/like.js"></script>
@endsection