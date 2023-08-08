<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated(); 
        $task = Task::create([
            'title'=>$validated['title'], 
            'content'=>$validated['content'], 
            'delegator_id'=>$validated['delegator_id'], 
            'delegate_id'=>$validated['delegate_id'], 
            'deadline'=>$validated['deadline'], 
            'status_id'=>$validated['status_id'], 
        ]);
        return response()->json([
            'task' => $task
        ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
