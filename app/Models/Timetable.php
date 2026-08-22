<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'day_of_week',
        'period',
        'subject_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}