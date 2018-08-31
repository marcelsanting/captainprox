<?php
/**
 * DataController
 *
 * Main Data Controller for Admin UI
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

class DataController extends Controller
{
    public function userdata()
    {
        return datatables()->of(User::all())->toJson();
    }
}
