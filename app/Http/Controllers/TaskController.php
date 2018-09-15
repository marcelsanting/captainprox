<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Task;
use App\Models\Project;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }

    /**
     * Returns al list of all status data needed
     *
     * @param Feature $feature The Feature Model
     * @param Request $request The Request
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function tasksbyFeature(
        Feature $feature,
        Request $request
    ) {
        $request->user()->authorizeRoles(['Developer']);
        return datatables()->of(
            Task::query()
                ->whereFeature_id($feature->id)
        )
            ->addColumn(
                'statusname',
                function (Task $task) {
                    return $task->currentstatus->title;
                }
            )
            ->addColumn(
                'actions',
                function (Task $task) {
                    return '<a href="'.route('tasks.edit', $task->id).
                        '" class="btn btn-success">Show</a>';
                }
            )
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Returns al list of all status data needed
     *
     * @param Project $project The Project Model
     * @param Request $request The Request
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function tasksbyProject(
        Project $project,
        Request $request
    ) {
        $request->user()->authorizeRoles(['Developer']);
        return datatables()->of(
            Task::query()->where('project_id', '=', $project->id)->get()
        )
            ->addColumn(
                'statusname',
                function (Task $task) {
                    return $task->currentstatus->title;
                }
            )
            ->addColumn(
                'actions',
                function (Task $task) {
                    return '<a href="'.route('tasks.edit', $task->id).
                        '" class="btn btn-success">Show</a>';
                }
            )
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Returns al list of all status data needed
     *
     * @param User    $user    The User Model
     * @param Request $request The Request
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function tasksbyUser(
        User $user,
        Request $request
    ) {
        $request->user()->authorizeRoles(['Developer']);
        return datatables()->of(
            Task::query()->where('project_id', '=', $user->id)->get()
        )
            ->addColumn(
                'statusname',
                function (Task $task) {
                    return $task->currentstatus->title;
                }
            )
            ->addColumn(
                'actions',
                function (Task $task) {
                    return '<a href="'.route('tasks.edit', $task->id).
                        '" class="btn btn-success">Show</a>';
                }
            )
            ->rawColumns(['actions'])
            ->toJson();
    }
}
