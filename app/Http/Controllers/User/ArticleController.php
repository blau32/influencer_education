<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;


class ArticleController extends Controller
{
    public function showArticle(int $id)
    {
        $article = Article::findOrFail($id);
        return view('user.article', ['articles' => $article]);
    }
}
