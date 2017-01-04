@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
    <div class="signin-box">

      <h3 class="text-center">Sign in</h3>
      <hr>

      <form role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <a class="pull-right" href="{{ url('/password/reset') }}">Forgot password?</a>
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="checkbox pull-right">
          <label> <input type="checkbox" name="remember"> Remember me </label>
        </div>
        <button type="submit" class="btn btn btn-primary">Log In</button>
      </form>
    </div> 
  </div>
</div>
@endsection
