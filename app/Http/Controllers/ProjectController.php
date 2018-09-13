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
        $request->user()->authorizeRoles(
            [
                'Administrator', 'Manager', 'Developer'
            ]
        );
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
        $request->user()->authorizeRoles(
            [
                'Administrator', 'Manager', 'Developer'
            ]
        );
        $statuses = Status::all();

        return view(
            'projects.addproject',
            [
                "statuses" => $statuses
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
        $request->user()->authorizeRoles(
            [
                'Administrator', 'Manager', 'Developer'
            ]
        );
        $this->validate(
            request(), [
                "title" => "required|unique:projects",
                "body" => "required",
                "user_id" => "required"
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
        $request->user()->authorizeRoles(
            [
                'Administrator', 'Manager', 'Developer'
            ]
        );
        return view('projects.projectdetail')
            ->with(compact('project'));
    }
}
