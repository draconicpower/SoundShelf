@extends('layouts.app')
@section('title', 'Songs')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="dashboard-header">Songs</h1>
    <a href="{{ route('songs.create') }}" class="btn btn-success">Add Song</a>
</div>
<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search songs..." value="{{ request('search') }}">
        <button class="btn btn-outline-light" type="submit">Search</button>
    </div>
</form>
<div class="row g-3">
    @forelse($songs as $song)
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $song->title }}</h5>
                    <p class="card-text small">Album: {{ $song->album->title }}</p>
                    <a href="{{ route('songs.show', $song->id) }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    @empty
        <p>No songs found.</p>
    @endforelse
</div>
<div class="mt-4">
    {{ $songs->withQueryString()->links() }}
</div>
@endsection
