<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::with('user')
            ->latest()
            ->get();

        return view('projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pendiente,en progreso,completado',
        ]);

        $request->user()->projects()->create($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Proyecto creado correctamente.');
    }


    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {
        //
    }

    public function update(Request $request, Project $project)
    {
        //
    }

    public function destroy(Project $project)
    {
    abort_unless($project->user_id === request()->user()->id, 403);

    $project->delete();

    return redirect()->route('projects.index')
        ->with('success', 'Proyecto eliminado correctamente.');
    }
}
