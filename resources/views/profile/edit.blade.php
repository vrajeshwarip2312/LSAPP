@extends('layouts.app')

@section('header')
    <h2 class="fw-bold">My Profile</h2>
@endsection

@section('content')

<div class="container mt-4">

    {{-- Profile Edit --}}
    <div class="card shadow-sm mb-4" style="max-width: 600px;">
        <div class="card-body">
            <h3 class="card-title mb-4">👤 Edit Profile</h3>

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                {{-- Name --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           class="form-control"
                           required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           class="form-control"
                           required>
                </div>

                <button class="btn btn-primary">
                    Update Profile
                </button>
            </form>
        </div>
    </div>

    {{-- My Posts --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h3 class="card-title mb-3">📄 My Posts</h3>

            @forelse($posts as $post)
                <div class="d-flex justify-content-between align-items-center border rounded p-3 mb-2">
                    <div>
                        <strong>{{ $post->title }}</strong>
                        <p class="text-muted mb-0">{{ $post->created_at->format('d M Y') }}</p>
                    </div>

                    <div class="d-flex gap-2">
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
                    </div>
                </div>
            @empty
                <p class="text-muted">No posts created yet.</p>
            @endforelse
        </div>
    </div>

    {{-- Back --}}
    <div>
        <a href="{{ route('posts.index') }}"
           class="btn btn-secondary">
            ← Back to Posts
        </a>
    </div>

</div>

@endsection
