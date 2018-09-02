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
     * Returns the overview of the projects
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    Public function index()
    {
        return view('projects.index');
    }

    /**
     * Returns the new Project form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
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
        return null; //TODO make a proper function
    }
}
