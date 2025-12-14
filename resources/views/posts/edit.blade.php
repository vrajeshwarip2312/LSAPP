@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm col-md-8 mx-auto">
        <div class="card-body">

            <h2 class="mb-4">Edit Post</h2>

            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Title</label>
                    <input type="text"
                           name="title"
                           value="{{ $post->title }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Body</label>
                    <textarea name="body"
                              rows="5"
                              class="form-control"
                              required>{{ $post->body }}</textarea>
                </div>

                <button class="btn btn-warning">
                    Update
                </button>

                <a href="{{ route('posts.index') }}"
                   class="btn btn-secondary ms-2">
                    Back
                </a>
            </form>

        </div>
    </div>
</div>
@endsection
