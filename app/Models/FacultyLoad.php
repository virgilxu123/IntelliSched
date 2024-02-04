<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyLoad extends Model
{
    use HasFactory;

    public function class_schedules() {
        return $this->hasMany(ClassSchedule::class);
    }

    public function faculties() {
        return $this->hasMany(Faculty::class);
    }

    public function load_types() {
        return $this->hasMany(LoadType::class);
    }
}
