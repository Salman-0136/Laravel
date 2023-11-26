@extends('layouts.nav')

@section('content')
    <div class="container">
        <h2>Welcome to Your Dashboard, {{ $user->name }}!</h2>

        <h3>Your Blog Posts:</h3>

        @if ($posts->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="max-width: 100px; max-height: 100px;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $post->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>You haven't written any blog posts yet. <a href="{{ route('posts.create') }}">Start writing now!</a></p>
        @endif
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New Post</a>
    </div>
@endsection
