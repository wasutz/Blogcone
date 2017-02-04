<div class="col-md-4">
	<div class="job card">
		<h2 class="title">Jobs</h2>
		<ul>
			<li><a href="#">Job 1</a></li>
			<li><a href="#">Job 2</a></li>
		</ul>
	</div>
	<div class="tag card">
		<h2 class="title">Tags</h2>
		<ul>
			@foreach ($tags as $tag)
				<li><a href="{{ url("/tags/".$tag->id)}}">{{ $tag->name }}</a></li>
			@endforeach
		</ul>
	</div>
</div>