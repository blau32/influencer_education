<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Models\Curriculum;
// use App\Models\CurriculumProgress;
use App\Models\User;
use App\Models\Grade;

class ProgressController extends Controller
{
    public function showProgress()
    {
        $user = User::findOrFail(1);
        // $user = Auth::user(); 認証処理実装時用

        $grades = Grade::with('curriculums')->get();

        // 受講済み表示テスト
        // $progresses = CurriculumProgress::where('users_id', $user->id)
        //     ->get()
        //     ->keyBy('curriculums_id');

        return view(
            'user.curriculum_progress',
            compact('user', 'grades')
        );
    }
}
