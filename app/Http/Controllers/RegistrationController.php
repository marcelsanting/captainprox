<?php
/**
 * RegistrationController
 *
 * Registration Controller for Admin UI
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class RegistrationController
 * @package App\Http\Controllers
 */
class RegistrationController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $this->validate(request(), [
            "name" => "required|unique:users",
            "email" => "required|email",
            "password" => "required|confirmed"
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        Auth::login($user);

        return redirect('admin');
    }
}
