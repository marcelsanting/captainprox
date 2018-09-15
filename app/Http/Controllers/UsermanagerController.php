<?php
/**
 * AdminController
 *
 * AdminController sets the basis after the user has logged on to the website
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

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class UsermanagerController
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainproxessionController
 */
class UsermanagerController extends Controller
{

    /**
     * DataController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Opens the UserAdministration View
     *
     * @param Request $request Requesthandling
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Administrator']);
        return view('users.user_index');
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
     * @param \Illuminate\Http\Request $request Fetches the Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user The User Model
     * @param Role      $role Roles of users
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Role $role)
    {
        return View(
            'users.user_show', [
            'user' => $user,
            'roles' => $role::all(),
            ]
        );
    }

    /**
     * Show the user resource.
     *
     * @param \App\User $user User model
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request the Request
     * @param \App\User                $user    The User model
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync([]);
        $roles = $request->request->get("role");

        foreach ($roles as $role) {
            $user->roles()->attach($role);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user User Model
     *
     * @return Redirect Index Route
     *
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    /**
     * Fetches all userdata
     *
     * @param Request $request The Request
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function userdata(Request $request)
    {
        $request->user()->authorizeRoles(['Administrator']);

        $model = User::query();

        return DataTables::eloquent($model)
            ->addColumn(
                'actions',
                function (User $user) {
                    $show = '<a href="'.route('users.edit', $user->id).
                        '" class="btn btn-success">Edit</a>';
                    return $show;
                }
            )
            ->rawColumns(['actions'])
            ->toJson();
    }
}
