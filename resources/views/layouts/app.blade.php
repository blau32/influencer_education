<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>動画学習システム</title>

  @vite([
  ])

</head>
<body>
  <div>
    <main>
      @yield('content')
    </main>
  </div>
</body>
</html>