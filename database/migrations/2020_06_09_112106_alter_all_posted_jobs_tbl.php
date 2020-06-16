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
        Schema::table('jobanswerclinetdesc', function (Blueprint $table) {
            //
            $table->tinyInteger('active_status')->default(1);
            $table->string('project_status')->default("not_accepting");
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
