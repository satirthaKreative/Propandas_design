<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOnChatInviteTbls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat_invitation_tbls', function (Blueprint $table) {
            //
            $table->integer('project_id')->after('id')->nullable();
            $table->longText('project_name')->after('project_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat_invitation_tbls', function (Blueprint $table) {
            //
        });
    }
}
