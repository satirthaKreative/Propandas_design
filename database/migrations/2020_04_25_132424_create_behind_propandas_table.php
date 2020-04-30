<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBehindPropandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('behind_propandas_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('behind_propandas_descriptions');
            $table->longText('behind_propandas_images');
            $table->string('owner_name');
            $table->string('designation');
            $table->longText('behind_propandas_pdetails');
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
        Schema::dropIfExists('behind_propandas_tbl');
    }
}
