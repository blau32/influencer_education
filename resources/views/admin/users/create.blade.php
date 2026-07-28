@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">新規ユーザー登録</h1>
        <a href="{{ route('admin.top') }}" class="text-sm text-gray-600 hover:underline">
            &laquo; 管理トップに戻る
        </a>
    </div>

    <div class="bg-white p-6 rounded shadow-md">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            {{-- お名前 --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">
                    お名前 <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('name') border-red-500 @enderror"
                    placeholder="例：山田 太郎">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- メールアドレス --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">
                    メールアドレス <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror"
                    placeholder="example@email.com">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- パスワード --}}
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">
                    パスワード (8文字以上) <span class="text-red-500">*</span>
                </label>
                <input type="password" id="password" name="password"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- パスワード確認用 --}}
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">
                    パスワード (確認用) <span class="text-red-500">*</span>
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>

            {{-- 権限区分 --}}
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">
                    権限区分 <span class="text-red-500">*</span>
                </label>
                <div class="flex items-center space-x-6">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="role" value="1" {{ old('role', '1') == '1' ? 'checked' : '' }} class="form-radio text-blue-600">
                        <span class="ml-2">1: 一般ユーザー</span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="role" value="2" {{ old('role') == '2' ? 'checked' : '' }} class="form-radio text-blue-600">
                        <span class="ml-2">2: 管理者</span>
                    </label>
                </div>
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- 送信ボタン --}}
            <div class="flex items-center justify-end space-x-3">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none">
                    ユーザーを登録する
                </button>
            </div>
        </form>
    </div>
</div>
@endsection