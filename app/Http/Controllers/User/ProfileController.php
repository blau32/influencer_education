<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfileForm(){
        // $user = Auth::user();
        $user = User::findOrFail(1);

        return view('user.profile_edit', compact('user'));
    }
}
