@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('layouts.patials.admin-sidebar');
        </div>
        <div class="card col-md-9">
            <h1>Posts</h1>

            <table class="table table-striped">
              <tr>
                <th>Title</th>
                <th>Action</th>
              </tr>
              @foreach($posts as $post)
                <tr>
                  <td class="col-sm-8">{{ $post->title }}</td>
                  <td class="col-sm-4">
                     <a href="{{ route('posts.edit', ["id"=> $post->id]) }}">
                        <button class="btn btn-success btn-sm">Edit</button>
                     </a>
                     <button data-path="{{ route('posts.destroy', ["id"=> $post->id]) }}" data-title="{{ $post->title }}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#confirmDelete">Delete</button>
                  </td>
                </tr>                
              @endforeach
            </table>

            <div class="col-md-12 text-center">
              {!! $posts->links() !!}
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
     <form id="form-deleted" action="#" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete" />

        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="deleteLabel">Delete?</h4>
            </div>
            <div class="modal-body">
              <b>This is permanent delete.</b> Are you sure you want to delete 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Delete</button>
            </div>
          </div>
        </div>
      </form>
    </div>
@endsection

@section('scripts')
  <script>
    $('#confirmDelete').on('show.bs.modal', function(e) {
        var data = $(e.relatedTarget).data();

        $('.modal-body', this).append('<b>' + data.title + '</b> ?');
        $('#form-deleted').attr('action', data.path);
    });
  </script>
@endsection