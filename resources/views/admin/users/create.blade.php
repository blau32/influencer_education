@extends('layouts.admin')

@section('title', '新規ユーザー登録')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold mb-6">新規ユーザー登録</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">氏名 <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full border rounded p-2 text-sm">
            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">メールアドレス <span class="text-red-500">*</span></label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded p-2 text-sm">
            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">パスワード <span class="text-red-500">*</span></label>
            <input type="password" name="password" required class="w-full border rounded p-2 text-sm">
            @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">パスワード（確認用） <span class="text-red-500">*</span></label>
            <input type="password" name="password_confirmation" required class="w-full border rounded p-2 text-sm">
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('admin.top') }}" class="text-sm text-gray-600 hover:underline">戻る</a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm hover:bg-indigo-700">登録する</button>
        </div>
    </form>
</div>
@endsection