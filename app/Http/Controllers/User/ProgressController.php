<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CurriculumProgress;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function showProgress()
    {
        $user = Auth::user();

        $progress = CurriculumProgress::with(['curriculum', 'user'])->get();
        return view('user.progress', compact('progress'));
    }
}
