@extends('layouts.app')
@section('title', $playlist->name)
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="dashboard-header">{{ $playlist->name }}</h1>
    <div>
        <a href="{{ route('playlists.edit', $playlist->slug) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('playlists.destroy', $playlist->slug) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this playlist?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('playlists.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@if($songs->count())
    <h4 class="mt-4">Songs in Playlist</h4>
    <ul class="list-group list-group-flush">
        @foreach($songs as $song)
            <li class="list-group-item bg-dark text-light">
                <a href="{{ route('songs.show', $song->id) }}" class="text-light">{{ $song->title }}</a>
            </li>
        @endforeach
    </ul>
@endif
@endsection
