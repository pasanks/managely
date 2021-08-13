<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ProjectTasksController extends Controller
{
    /**
     * Storing tasks to projects
     *
     * @param CreateTaskRequest $request
     * @param Project $project
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateTaskRequest $request, Project $project)
    {
        $project->addTask(array_merge($request->validated(), ['user_id' => Auth::user()->id]));

        return redirect($project->path());
    }

    /**
     * Update a task which is assigned to a project
     *
     * @param UpdateTaskRequest $request
     * @param Project $project
     * @param Task $task
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTaskRequest $request, Project $project, Task $task)
    {
        $this->authorize('update', $task);

        $task->update($request->validated());

        return redirect($project->path());
    }
}
