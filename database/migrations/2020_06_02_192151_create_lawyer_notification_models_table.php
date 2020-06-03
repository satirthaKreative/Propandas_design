<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyerNotificationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer_notify_tbls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lawyer_id');
            $table->integer('client_id');
            $table->integer('project_id');
            $table->string('project_name');
            $table->string('unread_status')->default('unread');
            $table->tinyInteger('active_status')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->string('notify_type')->nullable();
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
        Schema::dropIfExists('lawyer_notify_tbls');
    }
}
