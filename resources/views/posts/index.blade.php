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

	<!-- Delete Modal -->
	<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
	 	<form id="form-deleted" action="#" method="post">
		    {{ csrf_field() }}
		    {{ method_field('DELETE')}}

		    <div class="modal-dialog" role="document">
		      	<div class="modal-content">
		        	<div class="modal-header">
		          		<button type="button" class="close" 
		          				data-dismiss="modal" aria-label="Close">
		          				<span aria-hidden="true">&times;</span>
		          		</button>
		          		<h4 class="modal-title" id="deleteLabel">Delete?</h4>
		        	</div>
			        <div class="modal-body">
			          <b>This is permanent delete.</b> 
			          Are you sure you want to delete 
			        </div>
		        	<div class="modal-footer">
		          		<button type="button" class="btn btn-default" 
		          				data-dismiss="modal">Cancel
		          		</button>
		          		<button type="submit" class="btn btn-primary">
		          			Delete
		          		</button>
		        	</div>	
		      	</div>
		    </div>
	  	</form>
	</div>
@endsection

@section("scripts")
	<script src="js/like.js"></script>
	<script>
	    $('#confirmDelete').on('show.bs.modal', function(e) {
	        var data = $(e.relatedTarget).data();

	        $('.modal-body', this).append('<b>' + data.title + '</b> ?');
	        $('#form-deleted').attr('action', data.path);
	    });
	</script>
@endsection