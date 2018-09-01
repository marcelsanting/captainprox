<?php
/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to the MIT license
 * that is available through the world-wide-web at the following URI:
 * https://opensource.org/licenses/MIT
 *
 * @category   LaravelProject
 * @package    ProxCMS
 * @author     Original Author <author@example.com>
 * @author     Marcel Santing <marcel@prox-web.nl>
 * @copyright  2018 Prox-Web
 * @license    https://opensource.org/licenses/MIT  MIT License
 * @version    SVN: $Id$
 * @link       https://github.com/marcelsanting/captainprox
 * @since      File available since Release 1.0.0
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
