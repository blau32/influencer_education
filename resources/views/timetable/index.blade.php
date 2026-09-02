@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">時間割</h1>
    </div>

    <div class="bg-white p-6 rounded shadow-md overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 text-center">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-3 w-20 text-gray-700">時限</th>
                    @foreach($days as $day)
                        <th class="border border-gray-300 p-3 text-gray-700 font-bold">{{ $day }}曜日</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($periods as $period)
                    <tr>
                        <td class="border border-gray-300 p-3 bg-gray-50 font-semibold text-gray-600">
                            {{ $period }}限
                        </td>
                        @foreach($days as $day)
                            <td class="border border-gray-300 p-4 hover:bg-blue-50 transition-colors">
                                @if(isset($timetable[$day][$period]))
                                    <div class="font-medium text-gray-800">
                                        {{ $timetable[$day][$period] }}
                                    </div>
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection