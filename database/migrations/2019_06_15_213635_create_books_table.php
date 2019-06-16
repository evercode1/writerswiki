<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->string('author', 100)->unique();
            $table->string('url')->unique();
            $table->string('slug', 100);
            $table->integer('category_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('is_active')->default(1);
            $table->longText('description');
            $table->string('image_name')->unique()->nullable();
            $table->string('image_extension', 10)->nullable();
            $table->timestamps();
            $table->index('user_id');
            $table->index('category_id');
            $table->index('subcategory_id');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {

        Schema::dropIfExists('books');

    }

}