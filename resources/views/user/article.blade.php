@extends('layouts.app')

@section('content')
<div class="container">
  <div class="nav">
    <ul>
      <li><a href="{{ route('user.show.curriculum')}}">時間割</a></li>
      <li><a href="{{ route('user.show.progress')}}">授業進捗</a></li>
      <li><a href="{{ route('user.show.profile')}}">プロフィール設定</a></li>
      <li class="logout">
        <form method="POST" action="#">
          @csrf
          <button type="submit">ログアウト</button>
        </form>
      </li>
    </ul>
  </div>

  <div class="back">
    <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('user.show.curriculum') }}">
      ←戻る
    </a>
  </div>



  <div class="contents">
    <div class="date">
      <p>{{ $article->posted_date->format('Y年m月d日') }}</p>
    </div>
    <div class="title">
      <h1>{{ $article->title }}</h1>
    </div>
    <div class="article_contents">
      <p>{{ $article->article_contents }}</p>
    </div>
  </div>

</div>
@endsection