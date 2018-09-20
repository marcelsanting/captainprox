<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentPost;
use App\Models\TaskComment;


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
