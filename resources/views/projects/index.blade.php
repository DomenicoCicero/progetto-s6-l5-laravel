@extends('templates.base')

@section('title', 'All Projects')

@section('content')
@session('no_permission')
    <div class="alert alert-danger" role="alert">
        Non hai i permessi per modificare il progetto
    </div>
@endsession

@session('operation_success')
    <div class="alert alert-success" role="alert">
        Il progetto "{{ session('operation_success')->name }}" è stato eliminato con successo
    </div>
@endsession

@session('update_success')
    <div class="alert alert-success" role="alert">
        Risorsa "{{ session('update_success')->name }}" aggiornata <a
            href="{{ route('projects.show', ['id' => session('update_success')->id]) }}">Visualizza</a>
    </div>
@endsession

@if ($projects->count())
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            @auth <th scope="col">Actions</th> @endauth
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <th scope="row">{{ $project->id }}</th>
                <td><a href="{{ route('projects.show', ['id' => $project]) }}">{{ $project->name }}</a></td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->end_date }}</td>
                <td>{{ $project->created_at }}</td>
                <td>{{ $project->updated_at }}</td>
                @auth
                    <td>
                            <a class="btn btn-warning" href="{{ route('projects.edit', ['id' => $project]) }}">Edit</a>
                            <form action="{{ route('projects.destroy', ['id' => $project]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Elimina</button>
                            </form>
                    </td>
                @endauth
            </tr>
        @endforeach
    </tbody>
</table>
{{ $projects->links() }}
@else
<h2>Non ci sono progetti</h2>
@endif

@endsection