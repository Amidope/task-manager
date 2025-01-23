<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Redirect;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TaskStatus::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskStatuses = TaskStatus::all()->sort();
        return view('task_status.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $taskStatus = new TaskStatus();
//        dd($taskStatus);
        return view('task_status.create', compact('taskStatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskStatusRequest $request)
    {
        $validated = $request->validated();
        TaskStatus::create($validated);
        notify()->success(__('flashes.statuses.store.success'));
        return Redirect::route('task_statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus)
    {
        return view('task_status.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus)
    {
        $validated = $request->validated();
        $taskStatus->fill($validated)->save();
        notify()->success(__('flashes.statuses.updated'));
        return to_route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $taskStatus)
    {
        if ($taskStatus->tasks->isEmpty() && $taskStatus->delete()) {
            notify()->success(__('flashes.statuses.deleted'));
        } else {
            notify()->error(__('flashes.statuses.delete.error'));
        }
        return to_route('task_statuses.index');
    }
}
