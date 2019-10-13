@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h2>Tag: {{ $tag->name }}</h2>
		@foreach ($posts as $post)
			@include('layouts.patials.post', ['isMyPostPage' => false])
		@endforeach
	</div>
		
	<div class="col-md-12 text-center">
		{!! $posts->links() !!}
	</div>
</div>
@endsection

@section("scripts")
	<script src="/js/like.js"></script>
@endsection