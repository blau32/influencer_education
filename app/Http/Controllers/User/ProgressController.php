<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function showProgress()
    {
        $progress = CurriculumProgress::with(['curriculum', 'user'])->get();
        return view('user.progress', compact('progress'));
    }
}
