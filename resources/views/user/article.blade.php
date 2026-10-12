@extends('layouts.app')

@section('content')
<div class="container">
  <div class="nav">
    <ul>
      <li><a style="--chars: 3" href="{{ route('user.show.curriculum')}}"><span>時間割</span></a></li>
      <li><a style="--chars: 4" href="{{ route('user.show.progress')}}"><span>授業進捗</span></a></li>
      <li><a style="--chars: 8" href="{{ route('user.show.profile')}}"><span>プロフィール設定</span></a></li>
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