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
        Schema::create('library_ebooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('library_book_category_id');
            $table->unsignedBigInteger('academic_class_id');
            $table->string('name')->nullable();
            $table->string('author_name')->nullable();
            $table->string('book_code')->nullable();
            $table->decimal('price')->nullable();
            $table->string('cover_image')->nullable();
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
        Schema::dropIfExists('library_ebooks');
    }
};
