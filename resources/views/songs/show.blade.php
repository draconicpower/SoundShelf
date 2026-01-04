@extends('layouts.app')
@section('title', $song->title)
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="dashboard-header">{{ $song->title }}</h1>
    <div>
        <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this song?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('songs.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
<p class="mb-2"><strong>Album:</strong> <a href="{{ route('albums.show', $song->album->slug) }}" class="text-light">{{ $song->album->title }}</a></p>
<p class="mb-2"><strong>Track #:</strong> {{ $song->track_number }}</p>
<p class="mb-2"><strong>Duration:</strong> {{ $song->duration }} seconds</p>
@endsection
