<?php
/**
 * StatusController
 *
 * StatusController gives all projects, features and tasks their current status
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
 * Class StatusController
 *
 * Handles view and models of the statuses
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainproxessionController
 */
class StatusController extends Controller
{


    /**
     * Enabels Security in the controller
     *
     * StatusController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns the view of the list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('projects.status');
    }

    /**
     * Sets an creates a task
     *
     * @param Request $request for the form request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate(
            request(), [
                "title" => "required|unique:statuses"
            ]
        );

        Status::create(request(["title"]));

        return redirect()->back();
    }

    /**
     * Returns al list of all status data needed
     *
     * @param Request $request The Request
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function statusesdata(Request $request)
    {
        $request->user()->authorizeRoles(['Administrator', 'Manager', 'Developer']);
        return datatables()->of(Status::all())->toJson();
    }
}
