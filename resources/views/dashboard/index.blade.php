@extends('layouts.dashboard')

@section('content')
    <div class="md-card">
        <h3>Posts</h3>
        <p><a href="/dashboard/post/create" class="btn btn-success add-post">Create</a></p>
        @if(count($posts) > 0)
            <table class="md-table highlight">
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td><a target="_blank" href="/post/{{$post->slug}}" class="btn btn-default"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="post-action">View</span></a></td>
                        <td><a href="/dashboard/post/{{$post->id}}" class="btn btn-primary"><i class="fa fa-pencil"></i> <span class="post-action">Edit</span></a></td>
                        <td>
                            <form action="/dashboard/post/{{$post->id}}" method="POST">
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
        @else
            <p><b>No Posts found. Want to <a href="/dashboard/post/create">create One</a>?</b></p>
        @endif

    </div>
@endsection
