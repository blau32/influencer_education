<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;

class CurriculumController extends Controller
{
    public function showCurriculum(){
        $curriculum = Curriculum::all();
        return view('user.curriculum', compact('curriculum'));
    }
}