@extends('layouts.app')
@section('title', 'Add Song')
@section('content')
<h1 class="dashboard-header mb-4">Add Song</h1>
<form method="POST" action="{{ route('songs.store') }}">
    @csrf
    <div class="mb-3">
        <label for="album_id" class="form-label">Album</label>
        <select name="album_id" id="album_id" class="form-select" required>
            <option value="">Select album</option>
            @foreach($albums as $album)
                <option value="{{ $album->id }}" @selected(old('album_id') == $album->id)>{{ $album->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Song Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>
    <div class="mb-3">
        <label for="track_number" class="form-label">Track Number</label>
        <input type="number" class="form-control" id="track_number" name="track_number" value="{{ old('track_number') }}">
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label">Duration (seconds)</label>
        <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}">
    </div>
    <button type="submit" class="btn btn-success">Create</button>
    <a href="{{ route('songs.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
