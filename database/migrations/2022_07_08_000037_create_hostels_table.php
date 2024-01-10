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
        Schema::create('hostels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hostel_name')->nullable();
            $table->enum('hostel_type', ['Boys', 'Girls', 'Combine'])->nullable();
            $table->text('address')->nullable();
            $table->integer('fee')->nullable();
            $table->string('class_type')->nullable();
            $table->mediumInteger('total_floor')->nullable();
            $table->integer('total_rooms')->nullable();
            $table->mediumInteger('seat_per_room')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('hostels');
    }
};
