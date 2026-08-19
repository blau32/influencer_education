<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>バナー管理</title>
    <style>
        .error { color: red; font-size: 0.9em; }
        .alert-success { color: green; font-weight: bold; margin-bottom: 10px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>バナー管理</h1>

    {{-- 完了メッセージの表示 --}}
    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    {{-- バリデーション全般のエラー表示 --}}
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- バナー登録フォーム --}}
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">バナータイトル <span style="color:red;">*</span></label><br>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required maxlength="100">
        </div>

        <div style="margin-top: 10px;">
            <label for="image_path">バナー画像 <span style="color:red;">*</span></label><br>
            <input type="file" id="image_path" name="image_path" accept="image/png,image/jpeg,image/gif,image/webp" required>
        </div>

        <div style="margin-top: 10px;">
            <label for="redirect_url">遷移先URL <span style="color:red;">*</span></label><br>
            <input type="url" id="redirect_url" name="redirect_url" value="{{ old('redirect_url') }}" placeholder="https://example.com" required maxlength="2048">
        </div>

        <div style="margin-top: 10px;">
            <label for="sort_order">表示順 <span style="color:red;">*</span></label><br>
            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 1) }}" min="1" max="999" required>
        </div>

        <button type="submit" style="margin-top: 15px;">登録</button>
    </form>

    <hr style="margin-top: 30px;">

    {{-- バナー一覧テーブル --}}
    <h2>登録済みバナー一覧</h2>
    <table>
        <thead>
            <tr>
                <th>表示順</th>
                <th>サムネイル画像</th>
                <th>タイトル</th>
                <th>遷移先URL</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($banners as $banner)
                <tr>
                    <td>{{ $banner->sort_order }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->title }}" width="150">
                    </td>
                    <td>{{ $banner->title }}</td>
                    <td><a href="{{ $banner->redirect_url }}" target="_blank">{{ $banner->redirect_url }}</a></td>
                    <td>
                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('対象のバナーを削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">登録されているバナーはありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>