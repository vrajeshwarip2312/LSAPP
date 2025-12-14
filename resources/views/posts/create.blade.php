@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-body">

            <h2 class="mb-4">Create New Post</h2>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>There were some issues with your input:</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Create Form --}}
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mt-3">
                    <label class="fw-bold">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter post title..." required>
                </div>

                <div class="form-group mt-3">
                    <label class="fw-bold">Body</label>
                    <textarea name="body" rows="5" class="form-control" placeholder="Write something..." required></textarea>
                </div>

                <div class="form-group mt-3">
                    <label class="fw-bold">Upload Image (Optional)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button class="btn btn-success mt-4">
                    <i class="bi bi-plus-circle"></i> Create Post
                </button>

                <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-4 ms-2">
                    ← Back
                </a>

            </form>
        </div>
    </div>

</div>

@endsection
