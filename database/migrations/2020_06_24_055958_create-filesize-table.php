<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileSize_tbls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('file_size');
            $table->string('project_id');
            $table->string('project_name');
            $table->string('user_main_id');
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
        Schema::dropIfExists('fileSize_tbls');
    }
}
