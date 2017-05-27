@extends('layouts.app')

@section('content')

<div class="post card clearfix">
	<div class="row margin-up-2">
		<div class="col-md-3">
			<img src="{{ $user->getAvatarUrl(180) }}"/>
		</div>
		<div class="col-md-9">
		 	<div class="input-group col-md-7">
		 		<input type="text" class="form-control" value="{{ $user->username}}" disabled>
			</div>

			<div class="input-group col-md-7 margin-up-1">
		 		<input type="text" class="form-control" value="{{ $user->email}}" disabled>
			</div>
		</div>
	</div>
</div>

@endsection