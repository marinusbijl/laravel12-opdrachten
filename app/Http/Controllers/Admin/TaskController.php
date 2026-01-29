<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Activity;
use App\Models\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::paginate(15);
        return view('admin.tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.tasks.create', [
            'users' => User::all(),
            'activities' => Activity::all(), 
            'projects' => Project::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $task = new Task();
        $task->task = $request->input('task');
        $task->begindate = $request->input('begindate');
        $task->enddate = $request->input('enddate');
        $task->user_id = $request->input('user_id');
        $task->project_id = $request->input('project_id');
        $task->activity_id = $request->input('activity_id');
        $task->save();

        return redirect()->route('tasks.index')->with('status', "Taak: {$task->task} is aangemaakt");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        return view('admin.tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('admin.tasks.edit', [
            'task' => $task,
            'users' => User::all(),
            'activities' => Activity::all(), 
            'projects' => Project::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStoreRequest $request, Task $task)
    {
        $task->task = $request->input('task');
        $task->begindate = $request->input('begindate');
        $task->enddate = $request->input('enddate');
        $task->user_id = $request->input('user_id');
        $task->project_id = $request->input('project_id');
        $task->activity_id = $request->input('activity_id');
        $task->save();

        return redirect()->route('tasks.index')->with('status', "Taak: {$task->task} is gewijzigd");
    }

    public function delete(Task $task): View
    {
        return view('admin.tasks.delete', ['task' => $task]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('status', "Taak: {$task->task} is verwijderd");
    }
}
