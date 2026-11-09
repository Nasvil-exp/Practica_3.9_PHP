<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

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

    public function show(Project $project): View
    {
        $project->load(['user', 'participants']);

        $users = User::where('id', '!=', $project->user_id)
            ->whereDoesntHave('participatingProjects', function ($query) use ($project) {
                $query->where('projects.id', $project->id);
            })
            ->get();

        return view('projects.show', compact('project', 'users'));
    }

    public function edit(Project $project): View
    {
        abort_unless($project->user_id === request()->user()->id, 403);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        abort_unless($project->user_id === $request->user()->id, 403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pendiente,en progreso,completado',
        ]);

        $project->update($validated);

        return redirect()->route('projects.show', $project)
            ->with('success', 'Proyecto actualizado correctamente.');
    }

    
    public function addParticipant(Request $request, Project $project)
    {
        abort_unless($project->user_id === $request->user()->id, 403);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string|max:255',
            'contribution_hours' => 'required|integer|min:0',
        ]);


        if ($project->participants()->where('users.id', $validated['user_id'])->exists()) {
            return back()->withErrors([
                'user_id' => 'Este usuario ya participa en el proyecto.',
            ]);
        }

        $project->participants()->attach($validated['user_id'], [
            'role' => $validated['role'],
            'contribution_hours' => $validated['contribution_hours'],
        ]);

        return redirect()->route('projects.show', $project)
            ->with('success', 'Participante añadido correctamente.');
    }


    public function destroy(Project $project)
    {
        abort_unless($project->user_id === request()->user()->id, 403);

        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Proyecto eliminado correctamente.');
    }
}
