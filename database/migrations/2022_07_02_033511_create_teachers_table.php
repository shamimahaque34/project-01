<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('user_name')->nullable()->unique();
            $table->string('subject')->nullable();
            $table->string('phone')->nullable();
            $table->string('desination')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('education')->nullable();
            $table->string('password')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
