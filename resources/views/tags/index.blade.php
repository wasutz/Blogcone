@extends('layouts.app')

@section('content')
	@foreach ($tags as $tag)
		<div class="tag-block col-md-2">
			<a href="#">
				<h3 class="tag-name">{{ $tag->name }}</h3>
			</a>
		</div>
	@endforeach

	<div class="col-md-12 text-center text-uppercase">
		{!! $tags->links() !!}
	</div>
@endsection
