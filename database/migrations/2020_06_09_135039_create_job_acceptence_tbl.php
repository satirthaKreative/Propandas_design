<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAcceptenceTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_accept_tbls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id');
            $table->integer('lawyer_id');
            $table->integer('project_id');
            $table->string('project_name');
            $table->string('budget_of_project')->nullable();
            $table->string('days_of_project')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('work_status')->default('not_started');
            $table->string('project_start_date')->nullable();
            $table->string('project_close_date')->nullable();
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
        Schema::dropIfExists('job_accept_tbls');
    }
}
