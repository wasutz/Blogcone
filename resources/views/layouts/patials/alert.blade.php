@if (Session::has('info'))
	<div id="flash-message" class="alert alert-success" role="alert">
		{{ Session::get('info') }}
	</div>	
@endif