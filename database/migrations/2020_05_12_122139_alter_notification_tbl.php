<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNotificationTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('lawyer_des')->nullable();
            $table->longText('lawyer_comment')->nullable();
            $table->tinyInteger('billing_option')->default('0');
            $table->string('billing_rate');
            $table->integer('lawyer_id');
            $table->integer('project_id');
            $table->integer('client_id');
            $table->tinyInteger('active_status')->default('1');
            $table->string('unread_status')->default('unread');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_tbl');
    }
}
