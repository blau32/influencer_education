@extends('layouts.admin')

@section('content')
<div class="container py-5">
    
    <!-- 7. 見出し：管理者トップ -->
    <h1 class="h3 mb-4 text-dark border-bottom pb-2">管理者トップ</h1>

    <!-- ダッシュボードカード配置 -->
    <div class="row g-4">
        
        <!-- 8. 新規ユーザー登録カード -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title font-weight-bold text-primary mb-2">
                            新規ユーザー登録
                        </h5>
                        <p class="card-text text-muted small">
                            受講生および管理者の新規アカウント登録を行います。
                        </p>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary w-100 mt-3">
                        新規ユーザー登録画面へ
                    </a>
                </div>
            </div>
        </div>

        <!-- 9. バナー管理カード -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title font-weight-bold text-success mb-2">
                            バナー管理
                        </h5>
                        <p class="card-text text-muted small">
                            トップページ等に掲載するバナー画像の登録・管理を行います。
                        </p>
                    </div>
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-success w-100 mt-3">
                        バナー一覧画面へ
                    </a>
                </div>
            </div>
        </div>

        <!-- 10. お知らせ管理カード -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title font-weight-bold text-info mb-2">
                            お知らせ管理
                        </h5>
                        <p class="card-text text-muted small">
                            受講生向けのお知らせ記事の作成・編集・管理を行います。
                        </p>
                    </div>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-info text-white w-100 mt-3">
                        お知らせ一覧画面へ
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection