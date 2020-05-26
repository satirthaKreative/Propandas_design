<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('lawyer_des')->nullable();
            $table->longText('lawyer_comment')->nullable();
            $table->tinyInteger('billing_option')->default('0');
            $table->string('billing_rate');
            $table->integer('lawyer_id');
            $table->integer('project_id');
            $table->integer('client_id');
            $table->tinyInteger('active_status')->default('1');
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
        Schema::dropIfExists('proposal_tbl');
    }
}
