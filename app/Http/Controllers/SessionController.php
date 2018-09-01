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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class SessionController
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainproxessionController
 */
Class SessionController extends Controller
{
    /**
     * Returns the login view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('session.login');
    }

    /**
     * Validating the User
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
            "name" => "required",
            "password" => "required"
            ]
        );

        if (Auth::attempt(
            [
            'name' => $request->name,
            'password' => $request->password
            ]
        )
        ) {
            return redirect('admin');
        }


    }

    /**
     * Logs out the user and kill all sessions
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        Auth::logout();
        Session::flush();
        return Redirect('/');
    }
}
