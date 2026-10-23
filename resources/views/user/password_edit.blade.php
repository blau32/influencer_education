@extends('layouts.app')

@section('title', 'パスワード変更')

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
    <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('admin.show.top') }}">
      ←戻る
    </a>
  </div>

  <div class="contents">

    <p class="contents_title">パスワード変更</p>

    @if (session('success'))
    <p class="profile_success">
      {{ session('success') }}
    </p>
    @endif

    <form method="POST"
      action="{{ route('user.update.password') }}">
      @csrf

      <div class="user_profile_text">

        <label class="user_profile_row">
          旧パスワード
          <input type="password"
            name="old_password"
            placeholder="利用中のパスワードを入力してください">
        </label>

        @error('old_password')
        <p class="profile_error">{{ $message }}</p>
        @enderror

        <label class="user_profile_row">
          新パスワード
          <input type="password"
            name="new_password"
            placeholder="新しいパスワードを入力してください">
        </label>

        @error('new_password')
        <p class="profile_error">{{ $message }}</p>
        @enderror

        <label class="user_profile_row">
          新パスワード確認
          <input type="password"
            name="new_password_confirmation"
            placeholder="再度パスワードを入力してください">
        </label>
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