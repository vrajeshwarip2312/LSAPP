@extends('layouts.app')

@section('content')

<div class="container mt-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">All Posts</h2>

        @auth
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        + Create Post
    </a>
@endauth

    </div>

    {{-- Posts --}}
    @if ($posts->count() > 0)

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">

                    <div class="card shadow-sm h-100">

                        {{-- Post Image --}}
                        @if($post->image)
                            <img src="{{ asset('images/posts/' . $post->image) }}"
     class="card-img-top img-fluid"
     style="height:180px; object-fit:cover;">

                        @else
                            <img 
                                src="https://via.placeholder.com/400x200?text=No+Image"
                                class="card-img-top"
                                style="height:200px; object-fit:cover;"
                            >
                        @endif

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title fw-bold">
                                {{ $post->title }}
                            </h5>

                            <p class="text-muted small mb-3">
                                Posted on {{ $post->created_at->format('d M, Y') }} <br>
                                By <strong>{{ $post->user->name }}</strong>
                            </p>

                            <div class="mt-auto d-flex gap-2">

                                <a href="{{ route('posts.show', $post->id) }}"
                                   class="btn btn-info btn-sm text-white">
                                    View
                                </a>

                                @auth
                                    @if ($post->user_id === auth()->id())

                                        <a href="{{ route('posts.edit', $post->id) }}"
                                           class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('posts.destroy', $post->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this post?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>

                                    @endif
                                @endauth

                            </div>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    @else
        <div class="alert alert-info text-center">
            No posts found!
        </div>
    @endif

</div>

@endsection
