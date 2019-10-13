@extends('layouts.app')

@section('content')
	<div class="col-md-8">
		@foreach ($posts as $post)
			@include('layouts.patials.post', ['isMyPostPage' => true])
		@endforeach
		
		@if(count($posts) < 1)
			<h3 class="text-center">No posts to show</h3>
		@endif
	</div>

	@include('layouts.patials.sidebar')

	<div class="col-md-12 text-center">
		{!! $posts->links() !!}
	</div>

	@include('layouts.patials.delete-modal')
@endsection

@section("scripts")
	<script src="js/like.js"></script>
	<script>
	    $('#confirmDelete').on('show.bs.modal', function(e) {
	        var data = $(e.relatedTarget).data();

			$('.modal-post-title').text(data.title);
	        $('#form-deleted').attr('action', data.path);
	    });
	</script>
@endsection