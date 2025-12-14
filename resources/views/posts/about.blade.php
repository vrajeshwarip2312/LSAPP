@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="mb-3">About Us</h1>

            <p class="text-muted">
                This is the About Page of our Laravel Application.
            </p>

            <p>
                This website is created to demonstrate a full CRUD System
                with Authentication, Image Upload, and User-based Posts.
            </p>

            <hr>

            <a href="{{ route('home') }}" class="btn btn-primary">
                ← Back to Home
            </a>

        </div>
    </div>

</div>

@endsection
