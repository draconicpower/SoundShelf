@extends('layouts.app')
@section('title', 'Edit Playlist')
@section('content')
<h1 class="dashboard-header mb-4">Edit Playlist</h1>
<form method="POST" action="{{ route('playlists.update', $playlist->slug) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Playlist Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $playlist->name) }}" required>
    </div>
    <div class="mb-3">
        <label for="song_ids" class="form-label">Songs</label>
        <select name="song_ids[]" id="song_ids" class="form-select" multiple>
            @foreach($songs as $song)
                <option value="{{ $song->id }}" @selected($playlist->songs->contains($song->id))>{{ $song->title }}</option>
            @endforeach
        </select>
        <small class="form-text text-muted">Hold Ctrl (Cmd on Mac) to select multiple songs.</small>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('playlists.show', $playlist->slug) }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
