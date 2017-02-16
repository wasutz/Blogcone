@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('layouts.patials.admin-sidebar');
        </div>
        <div class="card col-md-9">
            <h1>Users</h1>

            <table class="table table-striped">
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
              @foreach($users as $user)
                <tr>
                  <td class="col-sm-3">{{ $user->username }}</td>
                  <td class="col-sm-3">{{ $user->email }}</td>
                  <td class="col-sm-3">{{ $user->getRoleName() }}</td>
                  <td class="col-sm-3">
                    <button class="btn btn-warning btn-sm">Edit</button>
                  </td>
                </tr>
              @endforeach
            </table>

            <div class="col-md-12 text-center">
              {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection