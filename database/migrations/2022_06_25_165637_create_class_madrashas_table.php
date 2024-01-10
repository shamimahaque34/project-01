<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassMadrashasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_madrashas', function (Blueprint $table) {
            $table->id();
            $table->string('class_name')->nullable();
            $table->string('class_numeric')->nullable();
            $table->text('class_note')->nullable();
            $table->string('class_lavel')->comment('primary,school,college')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('class_madrashas');
    }
}
