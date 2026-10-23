@extends('layouts.app')

@section('title', '管理_お知らせ一覧')

@section('content')

<div class="container">
  <div class="admin_nav">
    <ul>
      <li><a style="--chars: 3" href="#"><span>授業管理</span></a></li>
      <li><a style="--chars: 6" href="{{ route('admin.show.article_list')}}"><span>お知らせ管理</span></a></li>
      <li><a style="--chars: 5" href="#"><span>バナー管理</span></a></li>
      <li class="logout">
        <form method="POST" action="#">
          @csrf
          <button type="submit">ログアウト</button>
        </form>
      </li>
    </ul>
  </div>

  <div class="back">
    <a href="#">
      <!-- <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('user.show.curriculum') }}"> -->
      ←戻る
    </a>
  </div>

  <div class="contents">

    <p class="contents_title">お知らせ一覧</p>

    <div class="article_create_button">
      <a href="{{ route('admin.show.article_create')}}">新規登録</a>
    </div>

    <div class="article_list">

      <div class="article_list_header">
        <p>投稿日時</p>
        <p>タイトル</p>
      </div>

      <div class="article_list_content">
        @foreach ($articles as $article)
        <div class="article_list_content_item">
          <p>{{ $article->posted_date->format('Y年n月j日') }}</p>
          <p>{{ $article->title }}</p>
          <a href="{{ route('admin.show.article_edit', $article->id) }}">変更する</a>
          <form method="POST" action="admin.show.article_edit">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
          </form>
        </div>
        @endforeach
      </div>

    </div>

  </div>



</div>
@endsection