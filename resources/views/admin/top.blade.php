@extends('layouts.app') {{-- 共通レイアウトがあれば読み込み --}}

@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold mb-4">管理者トップ画面</h1>
    <div class="space-y-2">
        <p><a href="{{ route('admin.users.create') }}" class="text-blue-600 hover:underline">新規ユーザー登録へ</a></p>
        <p><a href="{{ route('admin.banners.index') }}" class="text-blue-600 hover:underline">バナー管理へ</a></p>
    </div>
</div>
@endsection