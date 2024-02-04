<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('designation_faculties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->nullable()->constrained();
            $table->foreignId('designation_id')->nullable()->constrained();
            $table->foreignId('academic_year_term_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designation_faculties');
    }
};
