@extends('layouts.dashboard')

@section('content')
    <div class="md-card">
        <h3>Photos</h3>
        <p><a href="/dashboard/photos/create" class="btn btn-success add-post">Create</a></p>
        @if(count($photos) > 0)
            <table class="md-table highlight">
                @foreach($photos as $photo)
                    <tr>
                        <td>{{$photo->name}}</td>
                        <td><a target="_blank" href="/dashboard/photos/{{ $photo->id }}" class="btn btn-default"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="post-action">View</span></a></td>
                        <td><a href="/dashboard/photos/{{ $photo->id }}/edit" class="btn btn-primary"><i class="fa fa-pencil"></i> <span class="post-action">Edit</span></a></td>
                        <td>
                            <form action="/dashboard/photos/{{$photo->id}}" method="POST">
                                <button class="btn btn-danger btn-delete">
                                    <i class="fa fa-trash"></i> <span class="post-action">Delete</span>
                                </button>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif

    </div>
@endsection
