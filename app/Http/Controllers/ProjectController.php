<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        $projects = Project::select()->paginate(8);
        return view('projects.index', compact('projects'));
    }


    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create(Request $request)
    {
        return view('projects.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $newProject = new Project();
        $newProject->name = $data['name'];
        $newProject->description = $data['description'];
        $newProject->start_date = $data['start_date'];
        $newProject->end_date = $data['end_date'];
        $newProject->save();

        return redirect()->route('projects.show', ['id' => $newProject->id])->with('creation_success', $newProject);
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $project = Project::findOrFail($id);

        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        $project->update();

        return redirect()->route('projects.index')->with('update_success', $project);
    }


    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('operation_success', $project);
    }
}
