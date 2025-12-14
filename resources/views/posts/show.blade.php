@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $post->title }}</h2>
    <p class="text-muted">Created on: {{ $post->created_at->format('d M, Y') }}</p>

    <p class="mt-3">{{ $post->body }}</p>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
