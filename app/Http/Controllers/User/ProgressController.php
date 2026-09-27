<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use App\Models\User;
use App\Models\Grade;

class ProgressController extends Controller
{
    public function showProgress()
    {
        $user = User::findOrFail(1);

        $grades = Grade::with('curriculums')->get();

        return view('user/curriculum_progress', compact('user', 'grades'));
    }
}
