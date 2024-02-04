<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $fillable = [
        'term',
    ];

    public function academic_years() {
        return $this->belongsToMany(AcademicYear::class);
    }
}
