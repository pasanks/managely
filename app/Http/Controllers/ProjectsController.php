<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\CreateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProjectRequest $request)
    {
        Auth::user()->projects()->create($request->validated());

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     * @return \Illuminate\View\View
     */
    public function edit(Project $project)
    {
        return view('projects.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $project->update($request->all());

        return redirect($project->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     * @return void
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();
    }
}
