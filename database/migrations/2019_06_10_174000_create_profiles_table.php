<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->unique();
            $table->longText('description')->nullable();
            $table->string('slug', 30);
            $table->integer('user_id')->unsigned();
            $table->boolean('is_contributor')->default(0);
            $table->integer('contributor_status')->default(5);
            $table->string('image_name')->unique()->nullable();
            $table->string('image_extension', 10)->nullable();
            $table->index('user_id');
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

        Schema::drop('profiles');

    }

}