@extends('layouts.nav')

@section('content')
    <h2>Blog Posts</h2>

    @foreach ($posts as $post)
        <div class="card my-3">
            @if ($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top" alt="{{ $post->title }}" style="max-width: 300px;">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
    @endforeach
@endsection
