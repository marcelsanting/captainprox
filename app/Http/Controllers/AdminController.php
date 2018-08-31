<?php
/**
 * AdminController
 *
 * Main Controller for Admin UI
 *
 * @package Laravel
 * @version 1.0.0
 * @author  ****
 * @license https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link ****
 * @since  1.0.0
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
