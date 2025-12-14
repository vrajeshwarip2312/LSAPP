@extends('layouts.app')

@section('header')
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold">Dashboard</h2>

        {{-- View Posts --}}
        <a href="{{ route('posts.index') }}" class="btn btn-light">
            📄 Posts
        </a>
    </div>
@endsection

@section('content')
    <div class="container mt-4">

        <p class="mb-3">
            Welcome <strong>{{ Auth::user()->name }}</strong> 👋
        </p>

        <div class="py-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

    </div>
@endsection
