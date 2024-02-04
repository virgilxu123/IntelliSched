<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'rank',
        'status',
        'image',
    ];

    public function faculty_load() {
        return $this->belongsTo(FacultyLoad::class);
    }

    public function designations () {
        return $this->belongsToMany(Designation::class);
    }
}
