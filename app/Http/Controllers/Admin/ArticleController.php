<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;


class ArticleController extends Controller
{
    public function showArticleList()
    {
        $articles = Article::all();

        return view('admin.article_list',  ['articles' => $articles]);
    }

    public function showArticleEdit(int $id)
    {
        $article = Article::findOrFail($id);

        return view('admin.article_edit', ['article' => $article]);
    }

    public function updateArticle(Request $request)
    {
        $validated = $request->validate([
            'posted_date' => ['required', 'date'],
            'title' => ['required', 'string', 'max:255'],
            'article_contents' => ['required', 'string'],
        ]);

        $article = Article::findOrFail($request->id);

        $article->posted_date = $validated['posted_date'];
        $article->title = $validated['title'];
        $article->article_contents = $validated['article_contents'];

        $article->save();

        return redirect()
            ->route('admin.show.article_list')
            ->with('success', 'お知らせを更新しました。');
    }

    public function showArticleCreate()
    {
        return view('admin.article_create');
    }

    public function storeArticle(Request $request)
    {
        $validated = $request->validate([
            'posted_date' => ['required', 'date'],
            'title' => ['required', 'string', 'max:255'],
            'article_contents' => ['required', 'string'],
        ]);

        $article = new Article();

        $article->posted_date = $validated['posted_date'];
        $article->title = $validated['title'];
        $article->article_contents = $validated['article_contents'];

        $article->save();

        return redirect()
            ->route('admin.show.article_list')
            ->with('success', 'お知らせを登録しました。');
    }

    public function deleteArticle(int $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()
            ->route('admin.show.article_list')
            ->with('success', 'お知らせを削除しました。');
    }
}
