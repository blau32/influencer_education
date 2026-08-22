<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', '教育システム') }}</title>
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

    {{-- 共通ヘッダー --}}
    <header class="bg-blue-600 text-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-bold text-xl tracking-wide">
                教育管理システム
            </a>
            
            <div class="flex items-center space-x-4 text-sm">
                @auth
                    <span>{{ Auth::user()->name }} 様</span>
                    @if(Auth::user()->role == 2)
                        <a href="{{ route('admin.top') }}" class="px-3 py-1 bg-blue-800 rounded hover:bg-blue-900">
                            管理トップ
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    {{-- メッセージ表示エリア（登録成功時など） --}}
    <div class="max-w-7xl mx-auto px-4 mt-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
    </div>

    {{-- 各画面のメインコンテンツが入る部分 --}}
    <main class="py-4">
        @yield('content')
    </main>

</body>
</html>