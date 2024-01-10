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
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academic_class_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('question_difficulty_level_id');
            $table->text('question')->nullable();
            $table->text('explanation')->nullable();
            $table->string('question_img')->nullable();
            $table->mediumInteger('mark')->nullable();
            $table->text('hints')->nullable();
            $table->smallInteger('question_answer_type')->comment('1=>mcq_2=>fill_in_the_blanks_3=>brod_que_ans' )->nullable();
            $table->mediumInteger('total_options')->nullable();
            $table->text('slug')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
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
        Schema::dropIfExists('questions');
    }
};
