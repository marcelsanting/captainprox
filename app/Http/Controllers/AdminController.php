<?php
/**
 * Admincontroller
 *
 * @category CMS
 * @author Marcel Santing
 * @license M.I.T.
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
        return view('admin.home', [
            "currrentuser" => User::find(Auth::id())]);
    }
}
