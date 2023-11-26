@extends('layouts.nav')

@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>

    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit Post</a>

    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Post</button>
    </form>
@endsection
