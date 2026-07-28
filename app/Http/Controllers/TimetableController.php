<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        // 曜日と時限の定義
        $days = ['月', '火', '水', '木', '金'];
        $periods = [1, 2, 3, 4, 5];

        // 時間割データ（DB連携前のサンプルデータ）
        $timetable = [
            '月' => [1 => '数学I', 2 => '英語コミュニケーション', 3 => '現代文', 4 => '物理', 5 => '体育'],
            '火' => [1 => '化学', 2 => '世界史', 3 => '数学II', 4 => '英語表現', 5 => '情報'],
            '水' => [1 => '現代文', 2 => '古文', 3 => '物理', 4 => '数学I', 5 => 'LHR'],
            '木' => [1 => '英語コミュニケーション', 2 => '数学II', 3 => '化学', 4 => '地理', 5 => '美術'],
            '金' => [1 => '世界史', 2 => '現代文', 3 => '英語表現', 4 => '数学I', 5 => '総合'],
        ];

        return view('timetable.index', compact('days', 'periods', 'timetable'));
    }
}