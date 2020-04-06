<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id');
            $table->integer('user_id');
            $table->integer('offer');
            $table->integer('counter_offer');
            $table->boolean('is_accepted')->default(0);
            $table->boolean('is_counter_offer_matched_to_user_offer')->default(0);
            $table->boolean('is_final_counter_offer')->default(0);
            $table->string('offer_quality');
            $table->integer('offer_quality_id');
            $table->integer('site_id');
            $table->timestamps();

            $table->index('user_id');
            $table->index('item_id');
            $table->index('offer');
            $table->index('counter_offer');
            $table->index('offer_quality_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
