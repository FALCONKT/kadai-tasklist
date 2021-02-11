<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Column追加
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('status');

        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Column削除出来るようにする
        Schema::table('tasks', function (Blueprint $table) {
           $table->dropColumn('status');

        });
    }
}
