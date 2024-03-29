<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academic_class_id');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('student_group_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->bigInteger('parent_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_questions');
    }
};
