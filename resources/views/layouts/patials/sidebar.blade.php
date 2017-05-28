<div class="col-md-4">
	<div class="tag card">
		<h2 class="title">Tags</h2>
		<ul>
			@foreach ($tags as $tag)
				<li><a href="{{ url("/tags/".$tag->id)}}">{{ $tag->name }}</a></li>
			@endforeach
		</ul>
	</div>

	<div class="tag card">
		<h2 class="title">Archives</h2>
		<ul>
			@foreach ($archives as $archive)
				<li>
					<a href="/?month={{ $archive['month'] }}&year={{ $archive['year'] }}">
						{{ $archive['month'] . ' ' . $archive['year'] }}
					</a>
				</li>
			@endforeach
		</ul>
	</div>
</div>