@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('layouts.patials.admin-sidebar');
        </div>
        <div class="card col-md-9">
            <h1>Tags</h1>

            <table class="table table-striped">
              <tr>
                <th>Name</th>
                <th>Action</th>
              </tr>
              @foreach($tags as $tag)
                <tr>
                  <td class="col-sm-8">{{ $tag->name }}</td>
                  <td class="col-sm-4">
                     <form class="inline-block" action="{{ route('tags.destroy', ["id"=> $tag->id]) }}" method="post">
                         {{ csrf_field() }}
                         <input type="hidden" name="_method" value="delete" />
                         <button class="btn btn-danger btn-sm">Delete</button>
                     </form>
                  </td>
                </tr>
              @endforeach
            </table>

            <div class="col-md-12 text-center">
              {!! $tags->links() !!}
            </div>
        </div>
    </div>
@endsection