<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規ユーザー登録</title>
    <style>
        .form-group { margin-bottom: 15px; }
        .error { color: red; font-size: 0.875rem; display: block; }
        .alert-danger { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h2>新規ユーザー登録</h2>

    {{-- DBエラー等のフラッシュメッセージ --}}
    @if (session('error'))
        <div class="alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        {{-- 氏名 --}}
        <div class="form-group">
            <label for="name">氏名 <span style="color:red;">*</span></label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="例）山田 太郎">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        {{-- メールアドレス --}}
        <div class="form-group">
            <label for="email">メールアドレス <span style="color:red;">*</span></label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="example@example.com">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        {{-- パスワード --}}
        <div class="form-group">
            <label for="password">パスワード <span style="color:red;">*</span></label><br>
            <input type="password" id="password" name="password">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        {{-- パスワード（確認） --}}
        <div class="form-group">
            <label for="password_confirmation">パスワード（確認） <span style="color:red;">*</span></label><br>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        {{-- 権限 --}}
        <div class="form-group">
            <label for="role">権限 <span style="color:red;">*</span></label><br>
            <select id="role" name="role">
                <option value="2" {{ old('role', '2') == '2' ? 'selected' : '' }}>受講生</option>
                <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>管理者</option>
            </select>
            @error('role')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        {{-- ボタン群 --}}
        <div class="form-group">
            <button type="submit">登録</button>
            {{-- 修正箇所: route('login') -> route('admin.login') --}}
            <a href="{{ route('admin.login') }}">ログインはこちら</a>
        </div>
    </form>
</body>
</html>