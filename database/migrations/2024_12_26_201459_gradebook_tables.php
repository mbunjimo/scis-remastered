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

        Schema::create('class_levels', function (Blueprint $table) {
            $table->id();
            $table->string('classId')->unique(); // classId should be like 2024-2025-F-5-PCM or 2024-F-1-C
            $table->string('year')->nullable();
            $table->string('combination')->nullable();
            $table->string('stream')->nullable();
            $table->string('level')->nullable();
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subjectId')->unique(); // subjectId should be like 2024-2025-BIOS-1 or 2024-2025-MATHS-2 or 2024-GEO-1
            $table->string('name');
            $table->string('shortName')->nullable();
            $table->string('description')->nullable();
            $table->boolean('isMandatory')->default(true);
            $table->timestamps();
        });

        Schema::create('assessments_types', function (Blueprint $table) {
            $table->id();
            $table->string('assessmentTypeId')->unique();  // assessmentTypeId should be like 2024-GEOG-TEST-1 or 2024-MATHS-EXAM-MIDTERM-1
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        
        Schema::create('grades_types', function (Blueprint $table) {
            $table->id();
            $table->string('gradeTypeId')->unique();  // gradeTypeId be like O-level-NECTA or A-level-NECTA or 
            $table->string('gradeType');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('grades_types_ranges', function (Blueprint $table) {
            $table->id();
            $table->string('grade_type_id');
            $table->foreign('grade_type_id')->references('gradeTypeId')->on('grades_types');
            $table->string('grade_mark');
            $table->string('lower_limit');
            $table->string('upper_limit');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('class_level_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('class_level_id');
            $table->foreign('class_level_id')->references('classId')->on('class_levels');
            $table->string('subject_id');
            $table->foreign('subject_id')->references('subjectId')->on('subjects');
            $table->timestamps();
        });

        Schema::create('class_level_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('class_level_id');
            $table->foreign('class_level_id')->references('classId')->on('class_levels');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('class_level_students', function (Blueprint $table) {
            $table->id();
            $table->string('class_level_id');
            $table->foreign('class_level_id')->references('classId')->on('class_levels');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('subjects_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('subject_id');
            $table->foreign('subject_id')->references('subjectId')->on('subjects');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('subjects_students', function (Blueprint $table) {
            $table->id();
            $table->string('subject_id');
            $table->foreign('subject_id')->references('subjectId')->on('subjects');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('subjects_assessments', function (Blueprint $table) {
            $table->id();
            $table->string('subject_id');
            $table->foreign('subject_id')->references('subjectId')->on('subjects');
            $table->string('assessment_type_id');
            $table->foreign('assessment_type_id')->references('assessmentTypeId')->on('assessments_types');
            $table->string('class_level_id');
            $table->foreign('class_level_id')->references('classId')->on('class_levels');
            $table->string('total_marks')->nullable();
            $table->string('weight')->nullable();
            $table->string('assessment_date')->nullable();
            $table->string('assessment_time')->nullable();
            $table->string('assessment_duration')->nullable();
            $table->string('assessment_status')->nullable();
            $table->timestamps();
        });

        Schema::create('assessments_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assessment_id');
            $table->foreign('assessment_id')->references('id')->on('subjects_assessments');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->string('marks');
            $table->string('grade_type_id');
            $table->foreign('grade_type_id')->references('gradeTypeId')->on('grades_types');
            $table->unsignedBigInteger('grade_type_range_id');
            $table->foreign('grade_type_range_id')->references('id')->on('grades_types_ranges');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments_results');
        Schema::dropIfExists('subjects_assessments');
        Schema::dropIfExists('subjects_students');
        Schema::dropIfExists('subjects_teachers');
        Schema::dropIfExists('class_level_students');
        Schema::dropIfExists('class_level_teachers');
        Schema::dropIfExists('class_level_subjects');
        Schema::dropIfExists('grades_types_ranges');
        Schema::dropIfExists('grades_types');
        Schema::dropIfExists('assessments_types');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('class_levels');

    }
};

