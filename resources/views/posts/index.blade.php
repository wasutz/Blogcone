@extends('layouts.app')

@section('content')
	<div class="col-md-8">
		@foreach ($posts as $post)
			<div class="card clearfix">
				<div class="manage-button pull-right">
					<div class="row">
						<div class="col-md-6">
							<a href="{{ route('posts.edit', ['post' => $post])}}"><button class="btn btn-warning">Edit</button></a>
						</div>
						<div class="col-md-6">
							<form action="{{ route('posts.destroy', ['post' => $post]) }}" method="post">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="delete"/>
								<button class="btn btn-danger" type="submit">Delete</button>
							</form>
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
				<p class="content">{!! $post->content !!}</p>

				<div class="pull-left">
					<span>Likes 147</span>
					<span>Comments 3</span>
				</div>
			</div>
		@endforeach
	</div>

	<div class="col-md-12 text-center">
		{!! $posts->links() !!}
	</div>
@endsection
