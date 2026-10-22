@extends('layouts.app')

@section('title', 'プロフィール設定')

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
    <p class="contents_title">プロフィール変更</p>

    @if (session('success'))
    <p class="profile_success">
      {{ session('success') }}
    </p>
    @endif

    <form method="POST"
      action="{{ route('user.update.profile') }}"
      enctype="multipart/form-data">
      @csrf

      <div class="user_profile">

        <div class="user_profile_image">
          <img src="{{ asset('storage/' . $user->profile_image) }}">
          <p>プロフィール画像</p>
          <input type="file" name="profile_image">
        </div>

        <div class="user_profile_text">

          <label class="user_profile_row">
            ユーザーネーム
            <input type="text" name="name" value="{{ $user->name }}">
          </label>

          <label class="user_profile_row">
            カナ
            <input type="text" name="name_kana" value="{{ $user->name_kana }}">
          </label>

          <label class="user_profile_row">
            メールアドレス
            <input type="email" name="email" value="{{ $user->email }}">
          </label>

          <div class="user_profile_row">
            <p>パスワード</p>
            <a
              class="user_profile_password"
              href="{{ route('user.show.password.edit') }}">
              パスワードを変更する
            </a>
          </div>

        </div>
      </div>

      <div class="user_profile_button">
        <button class="user_profile_register" type="submit">
          登録
        </button>
      </div>

    </form>
  </div>
</div>
@endsection