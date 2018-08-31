<?php
/**
 * SessionController
 *
 * Main Session Controller for Admin UI
 *
 * @package Laravel
 * @version 1.0.0
 * @author  ****
 * @license https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link ****
 * @since  1.0.0
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Session;

/**
 * Class SessionController
 * @package App\Http\Controllers
 */
class SessionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('session.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" => "required",
            "password" => "required"
        ]);

        if(Auth::attempt([
            'name' => $request->name,
            'password' => $request->password
        ]))
        {
            return redirect('admin');
        }


    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        Auth::logout();
        Session::flush();
        return Redirect('/');
    }
}
