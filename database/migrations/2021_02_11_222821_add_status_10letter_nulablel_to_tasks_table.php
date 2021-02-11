<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatus10letterNulablelToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('status', 10)->change();
            $table->string('status')->nullable()->change();
            // 10文字までに　＋　空文字ＯＫに
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
