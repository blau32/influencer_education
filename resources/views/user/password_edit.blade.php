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
    <a href="{{ route('user.show.profile') }}">
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

      <div class="user_profile_text password_fields">

<div class="user_profile_row">
  <label for="old_password">旧パスワード</label>
  <div>
    <input id="old_password"
      type="password"
      name="old_password"
      value="{{ old('old_password') }}"
      placeholder="利用中のパスワードを入力してください">
    @error('old_password')
      <p class="profile_error">{{ $message }}</p>
    @enderror
  </div>
</div>

<div class="user_profile_row">
  <label for="new_password">新パスワード</label>
  <div>
    <input id="new_password"
      type="password"
      name="new_password"
      value="{{ old('new_password') }}"
      placeholder="新しいパスワードを入力してください">
    @error('new_password')
      <p class="profile_error">{{ $message }}</p>
    @enderror
  </div>
</div>

<div class="user_profile_row">
  <label for="new_password_confirmation">新パスワード確認</label>
  <div>
    <input id="new_password_confirmation"
      type="password"
      name="new_password_confirmation"
      value="{{ old('new_password_confirmation') }}"
      placeholder="再度パスワードを入力してください">
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