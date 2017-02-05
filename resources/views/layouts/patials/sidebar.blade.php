<div class="col-md-4">
	<div class="tag card">
		<h2 class="title">Tags</h2>
		<ul>
			@foreach ($tags as $tag)
				<li><a href="{{ url("/tags/".$tag->id)}}">{{ $tag->name }}</a></li>
			@endforeach
		</ul>
	</div>
</div>