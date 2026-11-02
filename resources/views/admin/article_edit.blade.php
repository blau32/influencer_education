@extends('layouts.app')

@section('title', '管理_お知らせ設定')

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
    <a href="{{ route('admin.show.article_list') }}">
        ←戻る
    </a>
</div>

  <form method="POST" action="{{ route('admin.update.article', $article->id) }}">
    @csrf
    <div class="contents">
      <p class="contents_title">お知らせ変更</p>

      <div class="admin_article_form">
        <p>投稿日時</p>
        <div>
          <p>{{ $article->posted_date->format('Y年n月j日') }}</p>
        </div>

        <p>タイトル</p>
        <div>
          <input type="text" name="title" value="{{ old('title', $article->title) }}">
          @error('title')
          <p class="admin_article_error">{{ $message }}</p>
          @enderror
        </div>

        <p>本文</p>
        <div>
          <textarea name="article_contents" id="article_contents" rows="10">{{ old('article_contents', $article->article_contents) }}</textarea>
          @error('article_contents')
          <p class="admin_article_error">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="admin_article_button">
        <button class="admin_article_button_submit" type="submit">
          登録
        </button>
      </div>

    </div>
  </form>

</div>
@endsection