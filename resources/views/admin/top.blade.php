@extends('layouts.admin')

@section('title', '管理者トップ')

@section('content')
<div class="space-y-6">
    <!-- 7. 見出し -->
    <h1 class="text-2xl font-bold text-gray-800">管理者トップ画面</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- 8. 新規ユーザー登録カード -->
        <a href="{{ route('admin.users.create') }}" class="block p-6 bg-white rounded-lg border border-gray-200 shadow hover:bg-indigo-50 transition">
            <h2 class="text-xl font-bold text-indigo-700 mb-2">新規ユーザー登録</h2>
            <p class="text-gray-600 text-sm">新しい学習ユーザーのアカウントを作成します。</p>
        </a>

        <!-- 9. バナー管理カード -->
        <a href="{{ route('admin.banners.index') }}" class="block p-6 bg-white rounded-lg border border-gray-200 shadow hover:bg-indigo-50 transition">
            <h2 class="text-xl font-bold text-indigo-700 mb-2">バナー管理</h2>
            <p class="text-gray-600 text-sm">トップページ等に表示するバナー画像を管理します。</p>
        </a>

        <!-- 10. お知らせ管理カード -->
        <a href="{{ route('admin.articles.index') }}" class="block p-6 bg-white rounded-lg border border-gray-200 shadow hover:bg-indigo-50 transition">
            <h2 class="text-xl font-bold text-indigo-700 mb-2">お知らせ管理</h2>
            <p class="text-gray-600 text-sm">ユーザーへ通知するお知らせ記事の作成・編集を行います。</p>
        </a>
    </div>
</div>
@endsection