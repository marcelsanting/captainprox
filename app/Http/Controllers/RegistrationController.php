<?php
/**
 * This is the summary for a DocBlock.
 *
 * This is the description for a DocBlock. This text may contain
 * multiple lines and even some _markdown_.
 *
 * * Markdown style lists function too
 * * Just try this out once
 *
 * The section after the description contains the tags; which provide
 * structured meta-data concerning the given element.
 *
 * @author  Mike van Riel <me@mikevanriel.com>
 *
 * @since 1.0
 *
 * @param int $example This is an example function/method parameter description.
 * @param string $example2 This is a second example.
 */

namespace App\Http\Controllers;

use App\User;
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

        Auth::login($user);

        return redirect('admin');
    }
}
