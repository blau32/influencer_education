<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;


class ArticleController extends Controller
{
    public function showArticle()
    {
       return view('user.article.blade.php',['articles' => Article::all()]);
    }
}
