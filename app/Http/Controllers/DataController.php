<?php
/**
 * This is the summary for a DocBlock.
 *
 * This is the description for a DocBlock. This text may contain
 * multiple lines and even some _markdown_.
 *
 * * Markdown style lists function too
 * * Just try this out once
 *
 * The section after the description contains the tags; which provide
 * structured meta-data concerning the given element.
 *
 * @author  Mike van Riel <me@mikevanriel.com>
 *
 * @since 1.0
 *
 * @param int    $example  This is an example function/method parameter description.
 * @param string $example2 This is a second example.
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
