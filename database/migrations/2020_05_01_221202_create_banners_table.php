<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'banners', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->string('thumbnail');
                $table->string('link');
                $table->integer('sort')->default(0);
                $table->string('layout');
                $table->string('position')->nullable();
                $table->boolean('status')->default(true);
                $table->string('model')->nullable();
                $table->integer('model_id')->nullable();
                $table->string('type')->default('default');
                $table->string('target')->nullable();
                $table->string('rel')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
