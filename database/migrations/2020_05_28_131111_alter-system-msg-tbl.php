<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSystemMsgTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system_msg_tbl', function (Blueprint $table) {
            //
            $table->tinyInteger('unseen_status')->default(0)->after('system_msg_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_msg_tbl', function (Blueprint $table) {
            //
        });
    }
}
