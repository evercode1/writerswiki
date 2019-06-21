<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpressionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('expressions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label', 100);
            $table->string('slug', 100);
            $table->boolean('is_active')->default(1);
            $table->integer('user_id')->unsigned();
            $table->integer('emotion_id')->unsigned();
            $table->longText('description');
            $table->timestamps();
            $table->index('user_id');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {

        Schema::dropIfExists('expressions');

    }

}