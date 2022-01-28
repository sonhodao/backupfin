<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'review_likes', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedBigInteger('account_id')->nullable();
                $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
                $table->string('model');
                $table->integer('model_id');
                $table->boolean('like')->default(0);
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_likes');
    }
}
