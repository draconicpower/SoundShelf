@extends('layouts.app')
@section('title', 'My Playlists')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="dashboard-header">My Playlists</h1>
    <a href="{{ route('playlists.create') }}" class="btn btn-success">Add Playlist</a>
</div>
<div class="row g-3">
    @forelse($playlists as $playlist)
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $playlist->name }}</h5>
                    <a href="{{ route('playlists.show', $playlist->slug) }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    @empty
        <p>No playlists found.</p>
    @endforelse
</div>
<div class="mt-4">
    {{ $playlists->links() }}
</div>
@endsection
