<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('media_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->string('author', 100)->unique();
            $table->string('url')->unique();
            $table->integer('media_link_type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->index('user_id');
            $table->index('category_id');
            $table->index('subcategory_id');
            $table->index('media_link_type_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {

        Schema::dropIfExists('media_links');

    }

}