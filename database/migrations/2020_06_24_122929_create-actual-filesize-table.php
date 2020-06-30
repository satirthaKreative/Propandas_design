<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActualFilesizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileSize_actual_tbls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('size_in_gb')->nullable();
            $table->longText('size_in_kb')->nullable();
            $table->string('price_of_size')->nullable();
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
        Schema::dropIfExists('fileSize_actual_tbls');
    }
}
