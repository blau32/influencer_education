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

    public function updateArticle(Request $request, int $id)
    {
        $validated = $request->validate(
            [
                'title' => ['required', 'string', 'max:255'],
                'article_contents' => ['required', 'string','max:255'],
            ],
            [
                'title.required' => 'タイトルを入力してください。',
                'title.string' => 'タイトルを文字列で入力してください。',
                'title.max' => 'タイトルは255文字以内で入力してください。',
                'article_contents.required' => '本文を入力してください。',
                'article_contents.string' => '本文を文字列で入力してください。',
                'article_contents.max' => '本文は255文字以内で入力してください。',
            ]
        );

        $article = Article::findOrFail($id);

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
        $validated = $request->validate(
            [
            'title' => ['required', 'string', 'max:255'],
            'article_contents' => ['required', 'string','max:255'],
        ],
        [
            'title.required' => 'タイトルを入力してください。',
            'title.string' => 'タイトルを文字列で入力してください。',
            'title.max' => 'タイトルは255文字以内で入力してください。',
            'article_contents.required' => '本文を入力してください。',
            'article_contents.string' => '本文を文字列で入力してください。',
            'article_contents.max' => '本文は255文字以内で入力してください。',
        ]
        );

        $article = new Article();

        $article->posted_date = now();
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
