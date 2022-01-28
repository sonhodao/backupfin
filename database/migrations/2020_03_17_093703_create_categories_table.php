<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'categories', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->string('slug');
                $table->string('description')->nullable();
                $table->string('thumbnail');
                $table->integer('status')->default(1);
                $table->boolean('is_menu_bottom')->nullable()->default(false);
                $table->boolean('is_menu_popular')->nullable()->default(false);
                $table->boolean('is_menu_home')->nullable()->default(false);
                $table->nestedSet();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}
