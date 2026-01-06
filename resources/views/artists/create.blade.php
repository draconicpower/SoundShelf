@extends('layouts.app')
@section('title', 'Add Artist')
@section('content')
<h1 class="dashboard-header mb-4">Add Artist</h1>
@if($errors->any())
    <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('artists.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Artist Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
    <a href="{{ route('artists.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
