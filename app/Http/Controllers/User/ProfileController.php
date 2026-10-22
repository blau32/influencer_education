<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfileForm()
    {
        $user = User::findOrFail(1);
        // $user = Auth::user(); 認証処理実装時用

        return view('user.profile_edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'profile_image' => ['nullable', 'image', 'max:2048'],
        ]);

        $user = User::findOrFail(1);

        $user->name = $validated['name'];
        $user->name_kana = $validated['name_kana'];
        $user->email = $validated['email'];

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')
                ->store('images/profile', 'public');

            $user->profile_image = $path;
        }

        $user->save();

        return redirect()
            ->route('user.show.profile')
            ->with('success', 'プロフィールを変更しました。');
    }

    public function showPasswordForm()
    {
        return view('user.password_edit');
    }

    // チーム開発への影響を懸念し標準バリデーションの日本語化はしない
    public function updatePassword(Request $request)
    {
        $validated = $request->validate(
            [
                'old_password' => ['required'],
                'new_password' => ['required', 'min:8', 'max:128', 'confirmed'],
            ],
            [
                'old_password.required' => '旧パスワードを入力してください。',
                'new_password.required' => '新パスワードを入力してください。',
                'new_password.min' => '新パスワードは8文字以上で入力してください。',
                'new_password.max' => '新パスワードは128文字以内で入力してください。',
                'new_password.confirmed' => '新パスワードと確認用パスワードが一致しません。',
            ]
        );

        $user = User::findOrFail(1);

        if (!Hash::check($validated['old_password'], $user->password)) {
            return back()->withErrors([
                'old_password' => '旧パスワードが正しくありません。',
            ]);
        }

        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return redirect()
            ->route('user.show.password.edit')
            ->with('success', 'パスワードを変更しました。');
    }
}
