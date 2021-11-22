<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_answers', function (Blueprint $table) {
            $table->bigInteger('seller_application_id')->unsigned();
            $table->bigInteger('application_answer_id')->unsigned();
            $table->foreign('seller_application_id')->references('id')->on('seller_applications')
                    ->onDelete('cascade');
            $table->foreign('application_answer_id')->references('id')->on('application_answer_options')
                    ->onDelete('cascade');
            $table->unique(['seller_application_id', 'application_answer_id'], 'unique_seller_application_answer');
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
        Schema::dropIfExists('application_answers');
    }
}
