<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * UI-02-01: ユーザー＿時間割画面表示
     */
    public function index()
    {
        // 曜日の一覧
        $days = ['月', '火', '水', '木', '金'];

        // 時限の一覧（1限〜5限）
        $periods = [1, 2, 3, 4, 5];

        // 時間割データ（画面確認用のサンプルデータ）
        // ※将来的にDBから取得する処理に置き換えます
        $timetable = [
            '月' => [1 => '国語', 2 => '数学', 4 => '英語'],
            '火' => [2 => '理科', 3 => '社会'],
            '水' => [1 => '英語', 3 => '体育', 5 => '情報'],
            '木' => [1 => '数学', 4 => '音楽'],
            '金' => [2 => '国語', 3 => '理科', 5 => '総合'],
        ];

        // compact() で変数をビューに渡す
        return view('timetable.index', compact('days', 'periods', 'timetable'));
    }
}