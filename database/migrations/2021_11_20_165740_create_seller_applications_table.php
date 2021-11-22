<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shop_category_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('portfolio_link')->unique()->nullable();
            $table->text('online_store')->nullable();
            $table->timestamps();
            $table->foreign('shop_category_id')->references('id')->on('shop_categories'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_applications');
    }
}
