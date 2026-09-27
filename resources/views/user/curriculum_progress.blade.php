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

    <div class="user_info">
      <img src="{{ asset('storage/' . $user->profile_image) }}">
      <div class="user_info_text">
        <p>{{ $user->name }}さんの授業進捗</p>
        <p>
        現在の学年：
        <span class="current_grade {{ str_contains($user->grade->name, '高校') ? 'high-school' : '' }}">
          {{ $user->grade->name }}
        </span>
        </p>
      </div>
    </div>

    <div class="curriculum_progress">
      @foreach ($grades as $grade)

      <div class="curriculum_progress_item">

        <h2 class="curriculum_progress_item_title {{ str_contains($grade->name, '高校') ? 'high-school' : '' }}">
          {{ $grade->name }}
        </h2>

        @foreach ($grade->curriculums as $curriculum)

        <div class="curriculum_item">

          <span>{{ $curriculum->title }}</span>

          <input
            type="checkbox"
            disabled
            @checked(
            isset($progresses[$curriculum->id])
          && $progresses[$curriculum->id]->clear_flg == 1
          )
          >

        </div>

        @endforeach

      </div>

      @endforeach
    </div>
  </div>

</div>

</div>
@endsection