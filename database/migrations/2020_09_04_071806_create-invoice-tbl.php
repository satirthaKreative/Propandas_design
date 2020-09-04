<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_tbls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_id')->nullable();
            $table->integer('project_id');
            $table->string('project_name');
            $table->integer('client_id');
            $table->integer('lawyer_id');
            $table->string('sent_date')->nullable();
            $table->string('due_date')->nullable();
            $table->string('pay_amount')->nullable();
            $table->string('pay_check')->default('no');
            $table->string('active_check')->default('yes');
            $table->string('accept_check')->default('no');
            $table->string('active_status')->default(0);
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
        Schema::dropIfExists('invoice_tbls');
    }
}
