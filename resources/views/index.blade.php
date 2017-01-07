@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8">
		@foreach ($posts as $post)
			<div class="card clearfix">
				<h2 class="title"><a href="">{{ $post->title }}</a></h2>
				<div class="meta">
					<span>by <a href="#">Admin</a></span> -
					<span>{{ $post->created_at->format('d M Y') }}</span>
				</div>
				<p class="content">{{ $post->content }}</p>

				<div class="pull-left">
					<span>Likes 147</span>
					<span>Comments 3</span>
				</div>
				<button class="btn btn-primary pull-right">Readmore</button>
			</div>
		@endforeach
	</div>
	<div class="col-md-4">
		<div class="job card">
			<h2 class="title">Job</h2>
			<ul>
				<li><a href="#">Job 1</a></li>
				<li><a href="#">Job 2</a></li>
			</ul>
		</div>
		<div class="tag card">
			<h2 class="title">Tag</h2>
			<ul>
				<li><a href="#">Tag 1</a></li>
				<li><a href="#">Tag 2</a></li>
			</ul>
		</div>
    </div>
</div>
@endsection
