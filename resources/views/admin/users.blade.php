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
                  <td class="col-sm-4">{{ $user->email }}</td>
                  <td class="col-sm-3 text-uppercase {{ $user->isSuperUser() ? 'text-primary' : ''}}">
                    <strong>{{ $user->getRoleName() }}</strong>
                  </td>
                  <td class="col-sm-2">
                    <button class="btn btn-warning btn-sm" 
                            data-path="{{ route('users.updateRole', ["id" => $user->id]) }}" 
                            data-toggle="modal" 
                            data-target="#editRoleModal">Edit</button>
                  </td>
                </tr>
              @endforeach
            </table>

            <div class="col-md-12 text-center">
              {!! $users->links() !!}
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRole">
              <form id="form-edited" action="#" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="put" />

                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="editRolel">Edit Role</h4>
                      </div>
                      <div class="modal-body">
                        <select class="form-control" name="role_id">
                          <option value="{{ config('roles.basic') }}">Basic User</option>
                          <option value="{{ config('roles.super') }}">Super User</option>
                          <option value="{{ config('roles.admin') }}">Admin</option>
                        </select>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script>
    $('#editRoleModal').on('show.bs.modal', function(e) {
        var data = $(e.relatedTarget).data();

        $('#form-edited').attr('action', data.path);
    });
  </script>
@endsection