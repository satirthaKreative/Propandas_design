<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterJobanswerclientdescTblsColumnAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobanswerclinetdesc', function (Blueprint $table) {
            //
            $table->longText('inserted_ids')->nullable()->after('phone_number');
            $table->longText('not_action_ids')->nullable()->after('inserted_ids');
            $table->longText('chat_Or_act_ids')->nullable()->after('not_action_ids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobanswerclinetdesc', function (Blueprint $table) {
            //
        });
    }
}
