<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    /**
     * 新規ユーザー登録画面の初期表示
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * ユーザー情報登録処理
     */
    public function store(UserRegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            // users テーブルへ新規登録
            User::create([
                'name'     => $request->input('name'),
                'email'    => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role'     => $request->input('role'),
            ]);

            DB::commit();

            return redirect()
                ->route('admin.users.index')
                ->with('success', 'ユーザーを登録しました。');

        } catch (Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', '登録処理に失敗しました。');
        }
    }
}