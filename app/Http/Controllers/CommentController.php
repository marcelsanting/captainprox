<?php
/**
 * CommentController
 *
 * CommentController sets the basis after the user has logged on to the website
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

use App\Http\Requests\StoreCommentPost;
use App\Models\TaskComment;

/**
 * Class CommentController
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainprox
 */
class CommentController extends Controller
{
    /**
     * CommentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(
            'roles:Developer',
            [
                'only' => [
                    'store',
                    'destroy',
                ]
            ]
        );
    }

    /**
     * Stores the comment
     *
     * @param StoreCommentPost $request Validator
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCommentPost $request)
    {
        $validated = $request->validated();

        TaskComment::create(request(['body', 'user_id', 'task_id']));

        return redirect()->back();

    }
}
