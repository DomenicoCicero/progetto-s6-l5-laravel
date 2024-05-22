@extends('templates.base')

@section('title', "$project->name - EpiProjects")

@section('content')
    <h1>{{ $project->name }}</h1>

    @session('creation_success')
        <div class="alert alert-success" role="alert">
            Il progetto è stato creato con successo
        </div>
    @endsession
    <p>{{ $project->description}}</p>
    <p><span class="fw-bold">star-date: </span>{{ $project->start_date}}</p>
    <p><span class="fw-bold">end-date: </span>{{ $project->end_date ?? "progetto non ancora terminato" }}</p>
@endsection
