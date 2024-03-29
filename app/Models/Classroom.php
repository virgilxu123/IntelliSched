<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'type',
        'capacity',
    ];

    public function class_schedule() {
        return $this->belongsTo(ClassSchedule::class);
    }
}
