@extends('layouts.app')
@section('title', 'Edit Album')
@section('content')
<h1 class="dashboard-header mb-4">Edit Album</h1>
<form method="POST" action="{{ route('albums.update', $album->slug) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="artist_id" class="form-label">Artist</label>
        <select name="artist_id" id="artist_id" class="form-select" required>
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}" @selected(old('artist_id', $album->artist_id) == $artist->id)>{{ $artist->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Album Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $album->title) }}" required>
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $album->year) }}">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre', $album->genre) }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('albums.show', $album->slug) }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
