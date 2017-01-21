@extends('layouts.app')

@section('content')
	@foreach ($tags as $tag)
		<div class="tag-block col-md-3">
			<a href="#">
				<div class="clearfix">
					<h3 class="tag-name">{{ $tag->name }}</h3>
				</div>
			</a>
		</div>
	@endforeach

	<div class="col-md-12 text-center">
		{!! $tags->links() !!}
	</div>
@endsection
