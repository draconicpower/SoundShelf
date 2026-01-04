@extends('layouts.app')
@section('title', 'Add Album')
@section('content')
<h1 class="dashboard-header mb-4">Add Album</h1>
<form method="POST" action="{{ route('albums.store') }}">
    @csrf
    <div class="mb-3">
        <label for="artist_id" class="form-label">Artist</label>
        <select name="artist_id" id="artist_id" class="form-select" required>
            <option value="">Select artist</option>
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}" @selected(old('artist_id') == $artist->id)>{{ $artist->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Album Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre') }}">
    </div>
    <button type="submit" class="btn btn-success">Create</button>
    <a href="{{ route('albums.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
