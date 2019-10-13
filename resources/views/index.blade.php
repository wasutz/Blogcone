@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8">
		@foreach ($posts as $post)
			@include('layouts.patials.post', ['isMyPostPage' => false])
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