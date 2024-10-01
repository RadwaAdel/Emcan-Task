<!DOCTYPE html>
<head>
    <style>
        .table-hover tbody tr:hover {
            background-color: #f2f2f2;
        }

        .btn-primary {
            background-color: cornflowerblue;
            border: none;
        }

        .btn-primary:hover {
            background-color: #5a99d0;
        }

        .btn-warning {
            background-color: orange;
            border: none;
        }

        .btn-warning:hover {
            background-color: darkorange;
        }

        .btn-danger {
            background-color: red;
            border: none;
        }

        .btn-danger:hover {
            background-color: darkred;
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-between items-center border border-gray-300 rounded p-4 mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All posts') }}
            </h2>
            <h3 class="font-semibold text-xl text-blue-800 dark:text-blue-200 leading-tight">
                <a href="{{ route('posts.create') }}" class="btn btn-secondary btn-lg mb-3">Create New Post</a>
            </h3>
        </div>

        <x-table>
            <x-slot name="head">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </x-slot>

            <x-slot name="body">
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ Str::limit($post->content, 100) }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary btn-sm">Read More</a>
                            @can('update', $post)
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endcan
                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete this?')">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
    </div>
@endsection
