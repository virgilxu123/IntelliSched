<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYearTerm extends Model
{
    use HasFactory;

    public function class_schedule() {
        return $this->belongsTo(ClassSchedule::class);
    }

    public function designation_faculty() {
        return $this->belongsTo(DesignationFaculty::class);
    }
}
