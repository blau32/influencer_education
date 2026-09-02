{{-- resources/views/components/header.blade.php または layouts/header.blade.php --}}
<header class="bg-gray-800 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
        
        <!-- 1. システムロゴ / タイトル -->
        <div class="flex items-center space-x-8">
            <a href="{{ route('admin.top') }}" class="text-xl font-bold hover:text-gray-300">
                動画による学習システム
            </a>

            <!-- ナビゲーションメニュー -->
            <nav class="hidden md:flex space-x-4">
                <!-- 3. ユーザー管理 -->
                <a href="{{ route('users.index') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700">
                    ユーザー管理
                </a>
                <!-- 4. バナー管理 -->
                <a href="{{ route('banners.index') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700">
                    バナー管理
                </a>
                <!-- 5. お知らせ管理 -->
                <a href="{{ route('articles.index') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700">
                    お知らせ管理
                </a>
            </nav>
        </div>

        <!-- 2. ログインユーザー名 & 6. ログアウトボタン -->
        <div class="flex items-center space-x-6">
            <!-- ログインユーザー名 -->
            <span class="text-sm font-medium">
                {{ Auth::user()->name }} 様
            </span>

            <!-- ログアウト -->
            <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1.5 rounded transition">
                    ログアウト
                </button>
            </form>
        </div>

    </div>
</header>