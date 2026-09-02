<header class="bg-dark text-white p-3 mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- 1. システムロゴ/タイトル -->
        <a href="{{ route('admin.top') }}" class="text-white text-decoration-none h4 mb-0">
            動画による学習システム
        </a>

        <div class="d-flex align-items-center gap-3">
            <!-- 2. ログインユーザー名 -->
            <span>{{ Auth::user()->name ?? '管理者' }} 様</span>

            <!-- 3. ユーザー管理ボタン -->
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light btn-sm">ユーザー管理</a>

            <!-- 4. バナー管理ボタン -->
            <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-light btn-sm">バナー管理</a>

            <!-- 5. お知らせ管理ボタン -->
            <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-light btn-sm">お知らせ管理</a>

            <!-- 6. ログアウトボタン -->
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">ログアウト</button>
            </form>
        </div>
    </div>
</header>