@extends('layouts.app')
@section('title', $album->title)
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="dashboard-header">{{ $album->title }}</h1>
    <div>
        <a href="{{ route('albums.edit', $album->slug) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('albums.destroy', $album->slug) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this album?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('albums.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
<p class="mb-2"><strong>Artist:</strong> <a href="{{ route('artists.show', $album->artist->slug) }}" class="text-light">{{ $album->artist->name }}</a></p>
<p class="mb-2"><strong>Year:</strong> {{ $album->year }}</p>
<p class="mb-2"><strong>Genre:</strong> {{ $album->genre }}</p>
@if($album->songs->count())
    <h4 class="mt-4">Songs</h4>
    <ul class="list-group list-group-flush">
        @foreach($album->songs as $song)
            <li class="list-group-item bg-dark text-light">
                <a href="{{ route('songs.show', $song->id) }}" class="text-light">{{ $song->title }}</a>
            </li>
        @endforeach
    </ul>
@endif
@endsection
