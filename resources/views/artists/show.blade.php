@extends('layouts.app')
@section('title', $artist->name)
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="dashboard-header">{{ $artist->name }}</h1>
    <div>
        <a href="{{ route('artists.edit', $artist->slug) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('artists.destroy', $artist->slug) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this artist?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('artists.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@if($artist->albums->count())
    <h4 class="mt-4">Albums</h4>
    <ul class="list-group list-group-flush">
        @foreach($artist->albums as $album)
            <li class="list-group-item bg-dark text-light">
                <a href="{{ route('albums.show', $album->slug) }}" class="text-light">{{ $album->title }}</a>
            </li>
        @endforeach
    </ul>
@endif
@endsection
