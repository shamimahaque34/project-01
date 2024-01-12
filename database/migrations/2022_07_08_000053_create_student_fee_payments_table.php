<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_fee_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->unsignedBigInteger('academic_class_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('fee_type_id');
            $table
                ->enum('month', [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December',
                ])->nullable();
            $table->integer('amount')->nullable();
            $table->integer('due')->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('txt_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fee_payments');
    }
};
