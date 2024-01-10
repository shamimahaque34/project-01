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
        Schema::create('library_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('library_book_category_id');
            $table->string('name')->nullable();
            $table->string('author_name')->nullable();
            $table->string('publisher_name')->nullable();
            $table->string('book_code')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('due_quantity')->nullable();
            $table->string('cover_image')->nullable();
            $table->mediumInteger('self_no')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('library_books');
    }
};
