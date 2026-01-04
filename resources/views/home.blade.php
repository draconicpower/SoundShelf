@extends('layouts.app')
@section('title', 'Welcome to SoundShelf')
@section('content')
<div class="text-center mt-5">
    <h1 class="dashboard-header music-vibe mb-4">Welcome to SoundShelf</h1>
    <p class="lead mb-4">Your personal music library and playlist manager.<br>Discover, organize, and enjoy your favorite music with a modern, dark-themed dashboard.</p>
    <div class="row justify-content-center g-4">
        <div class="col-md-3">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Artists</h5>
                    <p class="card-text">Browse and manage your favorite artists.</p>
                    <a href="{{ route('artists.index') }}" class="btn btn-outline-success w-100">View Artists</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Albums</h5>
                    <p class="card-text">Explore albums by year, genre, or artist.</p>
                    <a href="{{ route('albums.index') }}" class="btn btn-outline-info w-100">View Albums</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Playlists</h5>
                    <p class="card-text">Create and manage your own playlists.</p>
                    @auth
                    <a href="{{ route('playlists.index') }}" class="btn btn-outline-warning w-100">My Playlists</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-warning w-100">Login to Access</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
