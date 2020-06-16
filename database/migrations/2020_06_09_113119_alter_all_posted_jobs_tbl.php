<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAllPostedJobsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('senderID');
            $table->bigInteger('clientID');
            $table->bigInteger('projectID');
            $table->string('projectNameID');
            $table->string('msg_type')->default('text_type');
            $table->longText('msg_content')->nullable();
            $table->double('size_of_file', 8, 2)->nullable();
            $table->integer('parenID')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('activeStatus')->default(1);
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
        Schema::dropIfExists('chat_tbl');
    }
}
