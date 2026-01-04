@extends('layouts.app')
@section('title', 'Artists')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="dashboard-header">Artists</h1>
    <a href="{{ route('artists.create') }}" class="btn btn-success">Add Artist</a>
</div>
<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search artists..." value="{{ request('search') }}">
        <button class="btn btn-outline-light" type="submit">Search</button>
    </div>
</form>
<div class="row g-3">
    @forelse($artists as $artist)
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $artist->name }}</h5>
                    <a href="{{ route('artists.show', $artist->slug) }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    @empty
        <p>No artists found.</p>
    @endforelse
</div>
<div class="mt-4">
    {{ $artists->withQueryString()->links() }}
</div>
@endsection
