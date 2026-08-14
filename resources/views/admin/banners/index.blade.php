<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>バナー管理 - 動画による学習システム</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('admin.header')

    <main class="container my-4">
        <h1 class="h3 mb-4">バナー管理</h1>

        <!-- 成功メッセージ -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- バリデーションエラー表示 -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- 登録フォーム -->
            <div class="col-md-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">新規バナー登録</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">タイトル <span class="badge bg-danger">必須</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">バナー画像 <span class="badge bg-danger">必須</span></label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">遷移先URL (任意)</label>
                                <input type="url" name="url" id="url" class="form-control" placeholder="https://example.com" value="{{ old('url') }}">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">登録する</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- 一覧表示 -->
            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="card-title mb-0">登録済みバナー一覧</h5>
                    </div>
                    <div class="card-body">
                        @if ($banners->isEmpty())
                            <p class="text-muted text-center my-3">登録されているバナーはありません。</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>プレビュー</th>
                                            <th>タイトル</th>
                                            <th>URL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banners as $banner)
                                            <tr>
                                                <td style="width: 120px;">
                                                    <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->title }}" class="img-fluid rounded" style="max-height: 60px; object-fit: cover;">
                                                </td>
                                                <td>{{ $banner->title }}</td>
                                                <td>
                                                    @if ($banner->url)
                                                        <a href="{{ $banner->url }}" target="_blank" class="text-truncate d-inline-block" style="max-width: 150px;">{{ $banner->url }}</a>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>