<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaLinkTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('media_link_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->boolean('is_active')->default(1);
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

        Schema::dropIfExists('media_link_types');

    }

}