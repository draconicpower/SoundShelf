@extends('layouts.app')
@section('title', 'Edit Artist')
@section('content')
<h1 class="dashboard-header mb-4">Edit Artist</h1>
<form method="POST" action="{{ route('artists.update', $artist->slug) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Artist Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $artist->name) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('artists.show', $artist->slug) }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
