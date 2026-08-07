@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto my-12 bg-white p-8 rounded shadow-md">
    <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">管理者ログイン</h1>

    {{-- ログイン認証失敗時のエラーメッセージ表示 --}}
    @error('login_error')
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-sm">
            {{ $message }}
        </div>
    @enderror

    <form action="{{ route('admin.login') }}" method="POST">
        @csrf

        {{-- メールアドレス --}}
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">
                メールアドレス <span class="text-red-500">*</span>
            </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="example@example.com"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- パスワード --}}
        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-semibold mb-2">
                パスワード <span class="text-red-500">*</span>
            </label>
            <input type="password" id="password" name="password"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded transition">
            ログイン
        </button>
    </form>
</div>
@endsection