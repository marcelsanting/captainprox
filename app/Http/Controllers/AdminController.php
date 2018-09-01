<?php
/**
 * This is the summary for the AdminConreoller.
 *
 * This controlles the functions for the basic view
 * after the user has logged on
 *
 * The section after the description contains the tags; which provide
 * structured meta-data concerning the given element.
 *
 * PHP Version 7
 *
 * @category PHP
 * @Package  Laravel
 * @license https://opensource.org/licenses/MIT MIT Public License
 * @author  Marcel Santing <marcel@prox-web.nl>
 * @link https://github.com/marcelsanting/captainprox Wiki of the project
 *
 */
namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminController
 *
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('admin.home',
            ["currrentuser" => User::find(Auth::id())]);
    }
}
