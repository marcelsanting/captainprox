<?php
/**
 * TaskController
 *
 * TaskController handles every possible way of a task
 *
 * PHP version 7
 *
 * LICENSE: This source file is subject to the MIT license
 * that is available through the world-wide-web at the following URI:
 * https://opensource.org/licenses/MIT
 *
 * @category  LaravelProject
 * @package   ProxCMS
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @version   SVN: $Id$
 * @link      https://github.com/marcelsanting/captainprox
 * @since     File available since Release 1.0.0
 */
namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Task;
use App\Models\Project;
use App\User;
use Illuminate\Http\Request;

/**
 * Class TaskController
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainproxessionController
 */
class TaskController extends Controller
{

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(
            'roles:Developer',
            [
                'only' => [
                    'index',
                    'show',
                    'projectsdata',
                    'create',
                    'store',
                    'destroy',
                    'tasksbyUser'
                ]
            ]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Return response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Return response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request handler
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Return response();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Task $task Task model
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        Return response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Task $task Task model
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        Return response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request Requesthandler
     * @param \App\Models\Task         $task    Task model
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        Return response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Task $task Task model
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Return response();
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
            $project->tasks()->whereClosed('0')
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
        return datatables()->of(
            $user->tasks()->whereClosed('0')
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
