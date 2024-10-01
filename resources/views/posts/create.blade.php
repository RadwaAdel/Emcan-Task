@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-between items-center border border-gray-300 rounded p-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create New Post') }}
            </h2>
            <h6 class="font-semibold text-xl text-blue-800 dark:text-blue-200 leading-tight">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-lg mb-3">Back to Posts</a>
            </h6>
        </div>


            <form action="{{ route('posts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <div class="flex justify-center">
                    <button type="submit" class="ml-4 font-semibold text-xl text-white leading-tight bg-cornflowerblue rounded px-4 py-2" style="background-color: cornflowerblue; width: 130px; border-radius: 3px;">
                        Create Post
                    </button>
                </div>
            </form>
    </div>
@endsection
