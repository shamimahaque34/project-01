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
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('educational_stage_id');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('student_group_id');
            $table->unsignedBigInteger('academic_class_id');
            $table->string('Subject_name');
            $table->string('subject_type__optional_mandatory')->nullable();
            $table
                ->integer('pass_mark')
                ->default(10)
                ->nullable();
            $table
                ->integer('final_mark')
                ->default(100)
                ->nullable();
            $table->smallInteger('point')->nullable();
            $table->string('Subject_author')->nullable();
            $table->string('Subject_code')->nullable();
            $table->text('Subject_book_image')->nullable();
            $table
                ->tinyInteger('Is_for_graduation')
                ->default(1)
                ->nullable();
            $table
                ->tinyInteger('is_main_subject')
                ->default(1)
                ->nullable();
            $table
                ->tinyInteger('Is_optional')
                ->default(1)
                ->nullable();
            $table->text('note')->nullable();
            $table->string('slug')->nullable();
            $table
                ->tinyInteger('status')
                ->default(1)
                ->nullable();

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
        Schema::dropIfExists('subjects');
    }
};
