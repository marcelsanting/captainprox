<?php
/**
 * Data Controller
 *
 * Data Controleer spits out the data needed for multiple lists
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
use App\Models\Project;
use App\User;
use App\models\Status;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

/**
 * Class DataController
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainprox
 */
class DataController extends Controller
{
    /**
     * Fetches all userdata
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function userdata()
    {
        return datatables()->of(User::all())->toJson();
    }

    /**
     * Returns al list of all status data needed
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function statusesdata()
    {
        return datatables()->of(Status::all())->toJson();
    }

    /**
     * Returns al list of all projects data needed
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function projectsdata()
    {
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
                    return "<a href='".route('show.project', $project->id).
                        "' class='btn btn-success'>Show</a>".
                        "<a href='".url('delete.project', $project->id).
                        "' class='btn btn-danger'>delete</a>";
                }
            )
            ->rawColumns(['actions'])
            ->addColumn(
                'progress',
                function (Project $project) {
                    $total = $project->tasks()
                        ->count("closed");
                    $done = $project->tasks()
                        ->where(
                            "closed",
                            "=",
                            "1"
                        )
                        ->count("closed");
                    $all = $total + $done;
                    if (!$total) {
                        return 0;
                    }

                    return $done/$all*100;
                }
            )
            ->toJson();
    }

    /**
     * Returns al list of all status data needed
     *
     * @param int $Id Project id
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function featuresbyID($Id)
    {
        return datatables()->of(
            Feature::query()
            ->where('project_id', '=', $Id)
        )
            ->addColumn(
                'statusname',
                function (Feature $feature) {
                    return $feature->currentstatus->title;
                }
            )
            ->addColumn(
                'progress',
                function (Feature $feature) {
                    return $feature->completed();
                }
            )
            ->addColumn(
                'actions',
                function (Feature $feature) {
                    return "<a href='".route('show.feature', $feature->id).
                        "' class='btn btn-success'>Show</a>";
                }
            )
            ->rawColumns(['actions'])
            ->toJson();
    }
}
