<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '管理画面') - 動画による学習システム</title>
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

    <!-- 共通ヘッダー -->
    <header class="bg-indigo-900 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-6">
                <!-- 1. システムロゴ / タイトル -->
                <a href="{{ route('admin.top') }}" class="text-xl font-bold hover:text-indigo-200">
                    学習システム 管理画面
                </a>
                
                <!-- ナビゲーションリンク -->
                <nav class="hidden md:flex space-x-4 text-sm">
                    <!-- 3. ユーザー管理 -->
                    <a href="{{ route('admin.users.index') }}" class="hover:bg-indigo-800 px-3 py-2 rounded">ユーザー管理</a>
                    <!-- 4. バナー管理 -->
                    <a href="{{ route('admin.banners.index') }}" class="hover:bg-indigo-800 px-3 py-2 rounded">バナー管理</a>
                    <!-- 5. お知らせ管理 -->
                    <a href="{{ route('admin.articles.index') }}" class="hover:bg-indigo-800 px-3 py-2 rounded">お知らせ管理</a>
                </nav>
            </div>

            <div class="flex items-center space-x-4 text-sm">
                <!-- 2. ログインユーザー名 -->
                @auth
                    <span>ログイン中: <strong class="font-semibold">{{ Auth::user()->name }}</strong> さん</span>
                @endauth

                <!-- 6. ログアウトボタン -->
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-xs">
                        ログアウト
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>