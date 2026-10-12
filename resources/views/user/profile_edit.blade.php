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
    <h1>プロフィール設定</h1>
    <div class="user_profile">
      <img src="{{ asset('storage/' . $user->profile_image) }}">
      <div class="user_profile_image">
        <p>プロフィール画像</p>
        <input type="file" name="profile_image">
        <p>ファイルを選択</p>
      </div>

      <div class="user_profile_text">
        <form method="PUT" action="#">
          @csrf
          <p>ユーザーネーム</p>
          <input type="text" name="name" value="{{ $user->name }}">
          <p>カナ</p>
          <input type="text" name="kana" value="{{ $user->kana }}">
          <p>メールアドレス</p>
          <input type="email" name="email" value="{{ $user->email }}">
          <p>パスワード</p>
          <input type="password" name="password" value="{{ $user->password }}">
          <button type="submit">保存</button>
        </form>
      </div>

    </div>

  </div>
  @endsection