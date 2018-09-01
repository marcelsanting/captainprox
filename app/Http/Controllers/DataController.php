<?php
/**
 * Data Controller
 *
 * Data Controleer spits out the data needed for multiple lists
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

/**
 * Class DataController
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainprox
 */
class DataController extends Controller
{
    /**
     * Fetches all userdata
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function userdata()
    {
        return datatables()->of(User::all())->toJson();
    }
}
