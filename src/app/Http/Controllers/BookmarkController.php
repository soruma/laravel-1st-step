<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store($articleId) {
        $user = \Auth::user();
        if (!$user->is_bookmark($articleId)) {
            $user->bookmark_articles()->attach($articleId);
        }

        return back();
    }

    public function destroy($articleId) {
        $user = \Auth::user();
        if ($user->is_bookmark($articleId)) {
            $user->bookmark_articles()->detach($articleId);
        }

        return back();
    }
}
