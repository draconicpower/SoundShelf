@extends('layouts.app')
@section('title', 'Albums')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="dashboard-header">Albums</h1>
    <a href="{{ route('albums.create') }}" class="btn btn-success">Add Album</a>
</div>
<form method="GET" class="mb-3 row g-2 align-items-end">
    <div class="col-md-4">
        <input type="text" name="search" class="form-control" placeholder="Search albums..." value="{{ request('search') }}">
    </div>
    <div class="col-md-3">
        <select name="genre" class="form-select">
            <option value="">All Genres</option>
            @foreach($albums->pluck('genre')->unique()->filter() as $genre)
                <option value="{{ $genre }}" @selected(request('genre') == $genre)> {{ $genre }} </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select name="sort" class="form-select">
            <option value="year" @selected(request('sort') == 'year')>Sort by Year</option>
            <option value="title" @selected(request('sort') == 'title')>Sort by Title</option>
        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-outline-light w-100" type="submit">Filter</button>
    </div>
</form>
<div class="row g-3">
    @forelse($albums as $album)
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $album->title }}</h5>
                    <p class="card-text small">{{ $album->artist->name }}<br>{{ $album->year }} | {{ $album->genre }}</p>
                    <a href="{{ route('albums.show', $album->slug) }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    @empty
        <p>No albums found.</p>
    @endforelse
</div>
<div class="mt-4">
    {{ $albums->withQueryString()->links() }}
</div>
@endsection
