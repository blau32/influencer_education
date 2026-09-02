<!-- 共通ヘッダー -->
<header class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <!-- 1. システムロゴ/タイトル -->
    <a class="navbar-brand font-weight-bold" href="{{ route('admin.top') }}">
        動画学習システム 管理画面
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="adminNavbar">
        <!-- ナビゲーションリンク -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- 3. ユーザー管理 -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">ユーザー管理</a>
            </li>
            <!-- 4. バナー管理 -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.banners.index') }}">バナー管理</a>
            </li>
            <!-- 5. お知らせ管理 -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.articles.index') }}">お知らせ管理</a>
            </li>
        </ul>

        <div class="d-flex align-items-center gap-3">
            <!-- 2. ログインユーザー名表示（Auth::user() を使用） -->
            <span class="text-light">
                ログイン中: <strong>{{ Auth::user()->name ?? '管理者' }}</strong> 様
            </span>

            <!-- 6. ログアウトボタン -->
            <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">ログアウト</button>
            </form>
        </div>
    </div>
</header>