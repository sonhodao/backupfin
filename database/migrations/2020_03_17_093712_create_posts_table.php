<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'posts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->text('content');
                $table->text('excerpt');
                $table->string('thumbnail');
                $table->string('slug');
                $table->string('author');
                $table->integer('status')->default(1);
                $table->boolean('is_hot')->default(false);
                $table->boolean('is_trending')->default(false);
                $table->boolean('is_popular')->default(false);
                $table->integer('sort')->default(0);
                $table->integer('view_count')->default(0);
                $table->dateTime('published_at');
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
        Schema::dropIfExists('posts');
    }
}
