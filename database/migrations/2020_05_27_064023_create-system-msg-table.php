<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemMsgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_msg_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_or_lawyer_id');
            $table->integer('client_or_lawyer_type');
            $table->string('client_or_lawyer_name')->nullable();
            $table->longText('administrator_msg')->nullable();
            $table->tinyInteger('system_msg_status')->default(1);
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
        Schema::dropIfExists('system_msg_tbl');
    }
}
