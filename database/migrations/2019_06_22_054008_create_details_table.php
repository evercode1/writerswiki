<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label', 100)->unique();
            $table->string('slug', 100);
            $table->boolean('is_active')->default(1);
            $table->longText('description');
            $table->integer('user_id')->unsigned();
            $table->integer('description_id')->unsigned();
            $table->timestamps();
            $table->index('user_id');
            $table->index('description_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {

        Schema::dropIfExists('details');

    }

}