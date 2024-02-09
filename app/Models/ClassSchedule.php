<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;

    public function blocks() {
        return $this->hasMany(Block::class);
    }

    public function subjects() {
        return $this->hasMany(Subject::class);
    }

    public function classrooms() {
        return $this->hasMany(Classroom::class);
    }

    public function times() {
        return $this->hasMany(Time::class);
    }

    public function days() {
        return $this->belongsToMany(Day::class);
    }

    public function academic_year_terms() {
        return $this->belongsTo(AcademicYearTerm::class);
    }

    public function faculty_load() {
        return $this->belongsTo(FacultyLoad::class);
    }
}
