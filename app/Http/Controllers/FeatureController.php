<?php
/**
 * FeatureController
 *
 * FeatureController gives all features for the parent project
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
use App\Models\Feature;

/**
 * Class FeatureController
 *
 * Handles view and models of the Features
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainproxessionController
 */
class FeatureController extends Controller
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
     * Returns the new Feature form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $statuses = Status::all();

        return view(
            'projects.features.addfeature',
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
        $this->validate(
            request(), [
                "title" => "required|unique:projects",
                "body" => "required",
                "user_id" => "required"
            ]
        );
        Feature::create(request(['title', 'body', 'user_id', 'project_id']));

        return redirect()->back();
    }


    /**
     * Shows the entire feature in detail
     *
     * @param Feature $feature The feature Model
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Feature $feature)
    {
        return view('projects.features.featuredetail')
            ->with(compact('feature'));
    }
}