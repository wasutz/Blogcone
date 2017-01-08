@extends('layouts.app')

@section('content')
<div class="form-center">
	<h2>Edit Post</h2>
	<form action="{{ route('posts.update', ['id' => $post->id]) }}" method="post">
		{{ csrf_field() }}
		<input name="_method" type="hidden" value="PUT">

		<div class="form-group">
		    <label for="title">Title:</label>
		    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
		</div>
		<div class="form-group">
		    <label for="content">Content</label>
		    <textarea name="content" class="form-control" rows="10" value="{{ $post->content }}"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>
@endsection
