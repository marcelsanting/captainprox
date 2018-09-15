<?php
/**
 * ProjectController
 *
 * ProjectController gives all projects, features and tasks their current status
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

use App\models\Status;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ProjectController
 *
 * Handles view and models of the Projects
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainproxessionController
 */
class ProjectController extends Controller
{
    /**
     * AdminController constructor.
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
                'projectsdata'
                ]
            ]
        );
        $this->middleware(
            'roles:Manager',
            [
                'only' => [
                    'create',
                    'store',
                    'destroy'
                ]
            ]
        );
    }

    /**
     * Returns the overview of the projects
     *
     * @param Request $request Get Request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    Public function index(Request $request)
    {
        return view('projects.index');
    }

    /**
     * Returns the new Project form
     *
     * @param Request $request Get Request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $statuses = Status::all();

        return view(
            'projects.add_project',
            [
                'statuses' => $statuses
            ]
        );
    }

    /**
     * Saves the new project created in the form
     *
     * @param Request $request data from form
     *
     * @return null
     */
    public function store(Request $request)
    {
        $this->validate(
            request(), [
                'title' => 'required|unique:projects',
                'body' => 'required',
                'user_id' => 'required'
            ]
        );
        Project::create(request(['title', 'body', 'user_id']));

        return redirect()->back();
    }


    /**
     * Shows the entire project in detail
     *
     * @param Project $project The project Model
     * @param Request $request Get Request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Project $project, Request $request)
    {
        return view('projects.project_detail')
            ->with(compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project Project Model
     *
     * @return Redirect Index Route
     *
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }

    /**
     * Returns al list of all projects data needed
     *
     * @param Request $request The Request
     *
     * @return mixed
     */
    public function projectsdata(Request $request)
    {
        $request->user()->authorizeRoles(['Developer']);
        $model = Project::query();

        return DataTables::eloquent($model)
            ->addColumn(
                'owner',
                function (Project $project) {
                    return $project->owner->name;
                }
            )
            ->addColumn(
                'statusname',
                function (Project $project) {
                    return $project->currentstatus->title;
                }
            )
            ->addColumn(
                'actions',
                function (Project $project) {
                    return (string) view(
                        'projects.partials.datatables.actions',
                        [
                        'project' => $project
                        ]
                    );
                }
            )
            ->rawColumns(['actions'])
            ->addColumn(
                'progress',
                function (Project $project) {
                    $total = $project->tasks()
                        ->count('closed');
                    $done = $project->tasks()
                        ->where(
                            'closed',
                            '=',
                            '1'
                        )
                        ->count('closed');
                    $all = $total + $done;
                    if (!$total) {
                        return 0;
                    }

                    return $done/$all*100;
                }
            )
            ->toJson();
    }
}
