@extends('layouts.app')

@section('stylesheets')
	<link rel="stylesheet" href="/css/select2.min.css">
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script src="/js/tinymce-config.js"></script>
@endsection

@section('content')
<div class="form-center">
	<h2>Edit Post</h2>
	<form action="{{ route('posts.update', ['id' => $post->id]) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('PUT') }}

		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		    <label for="title">Title:</label>
		    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">

		    @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
		    <label for="content">Content</label>
		    <textarea name="content" class="form-control" rows="10" value="{{ $post->content }}"></textarea>

		    @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
		</div>
		
		<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
		 	<label for="tags">Tags</label>
			<select id="tags" name="tags[]" class="form-control js-example-tags" multiple="multiple">
				@foreach($post->tags as $tag)
					<option value="{{ $tag->name }}" selected="selected">{{ $tag->name }}</option>
				@endforeach
			</select>

			@if ($errors->has('tags'))
                <span class="help-block">
                    <strong>{{ $errors->first('tags') }}</strong>
                </span>
            @endif
		</div>

		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>
@endsection

@section('scripts')
	<script src="/js/select2.min.js"></script>
	<script type="text/javascript">
		$(".js-example-tags").select2({
		  tags: true,
		  tokenSeparators: [",", " "],
		  multiple: true
		});
	</script>
@endsection
