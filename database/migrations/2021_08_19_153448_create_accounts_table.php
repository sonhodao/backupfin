<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'accounts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name', 256)->nullable();
                $table->string('username');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('sex', 10)->nullable();
                $table->string('mobile', 16)->nullable();
                $table->string('name_order')->nullable();
                $table->string('province')->nullable();
                $table->string('district')->nullable();
                $table->string('ward')->nullable();
                $table->string('street', 256)->nullable();
                $table->string('address')->nullable();
                $table->tinyInteger('block')->default(0)->nullable();
                $table->string('provider')->nullable();
                $table->string('provider_id')->nullable();
                $table->rememberToken();
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
        Schema::dropIfExists('accounts');
    }
}
