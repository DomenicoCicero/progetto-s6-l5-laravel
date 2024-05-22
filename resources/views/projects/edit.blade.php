@extends('templates.base')

@section('title', 'Edit Project')

@section('content')
    <h1>Projects edit</h1>
    <form method="POST" action="{{ route('projects.update', ['id' => $project]) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $project->name }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" required>{{ $project->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required value="{{ $project->start_date }}">
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $project->end_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
