<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'reviews', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id');
                $table->bigInteger('post_id');
                $table->bigInteger('parent_id')->nullable();
                $table->text('body');
                $table->tinyInteger('rating')->default(0)->nullable();
                $table->string('full_name')->nullable();
                $table->string('email')->nullable();
                $table->string('phone_number')->nullable();
                $table->text('file')->nullable();
                $table->boolean('approved')->default(false);
                $table->integer('count_like')->default(0);
                $table->integer('count_dislike')->default(0);
                $table->dateTime('publish_at')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
