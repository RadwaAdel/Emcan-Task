@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="mb-4"> <span>Post name : </span>{{ $post->title }}</h1>

        <div class="card mb-3">
            <div class="card-body">
                {{ $post->content }}
            </div>
        </div>
        <p class="text-muted">By {{ $post->user->name }} on {{ $post->created_at->format('F d, Y') }}</p>


        <div class="mt-3">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit Post</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure delete this?')">Delete Post</button>
                </form>
            @endcan
        </div>
    </div>
@endsection
