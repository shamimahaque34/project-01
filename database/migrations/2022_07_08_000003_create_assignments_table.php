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
        Schema::create('assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('academic_class_id');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('deadline')->nullable();
            $table->string('deadline_timestamp')->nullable();
            $table->string('file')->nullable();
            $table->string('file_type')->nullable();
            $table->text('note')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('assignments');
    }
};
