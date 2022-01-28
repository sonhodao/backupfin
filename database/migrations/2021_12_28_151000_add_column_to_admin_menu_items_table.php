<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToAdminMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'admin_menu_items', function (Blueprint $table) {
                $table->string('thumbnail')->after('text');
                $table->boolean('is_home')->default(false)->after('thumbnail');
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
        Schema::table(
            'admin_menu_items', function (Blueprint $table) {
                //
            }
        );
    }
}
