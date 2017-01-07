@extends('layouts.app')

@section('content')
<div class="form-center">
	<h2>Create New Post</h2>
	<form action="" method="post">
		{{ csrf_field() }}

		<div class="form-group">
		    <label for="title">Title:</label>
		    <input type="text" class="form-control" id="title" name="title">
		</div>
		<div class="form-group">
		    <label for="content">Content</label>
		    <textarea name="content" class="form-control" rows="10"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
</div>
@endsection
