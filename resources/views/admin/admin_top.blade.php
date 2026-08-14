<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者トップ - 動画による学習システム</title>
    <!-- Bootstrap 5 (CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- 共通ヘッダー読み込み -->
    @include('admin.header')

    <main class="container my-4">
        <!-- 7. 見出し：管理者トップ -->
        <h1 class="h3 mb-4">管理者トップ</h1>

        <div class="row g-4">
            <!-- 8. 新規ユーザー登録カード -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">ユーザー管理</h5>
                            <p class="card-text text-muted">新規ユーザーの登録処理を行います。</p>
                        </div>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mt-3">新規ユーザー登録</a>
                    </div>
                </div>
            </div>

            <!-- 9. バナー管理カード -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">バナー管理</h5>
                            <p class="card-text text-muted">トップバナーの一覧表示や新規登録を行います。</p>
                        </div>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-primary mt-3">バナー管理</a>
                    </div>
                </div>
            </div>

            <!-- 10. お知らせ管理カード -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">お知らせ管理</h5>
                            <p class="card-text text-muted">お知らせ情報の一覧表示や新規投稿を行います。</p>
                        </div>
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-primary mt-3">お知らせ管理</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>