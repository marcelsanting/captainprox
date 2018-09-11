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

use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

/**
 * Class RegistrationController
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainprox
 */
class RegistrationController extends Controller
{
    /**
     * Returns the view for Registration Controller
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('session.register');
    }

    /**
     * Stores and validates the User
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->validate(
            request(), [
            "name" => "required|unique:users",
            "email" => "required|email",
            "password" => "required|confirmed"
            ]
        );

        $user = User::create(request(['name', 'email', 'password']));

        $user
            ->roles()
            ->attach(Role::where('name', 'Developer')->first());

        Auth::login($user);

        return redirect('admin');
    }
}
