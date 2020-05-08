<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHowItWorksPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_its_works_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('video_iframe_links');
            $table->longText('post_your_job_detail1');
            $table->longText('post_your_job_detail2');
            $table->longText('get_proposal1');
            $table->longText('get_proposal2');
            $table->longText('hire_lawyer1');
            $table->longText('hire_lawyer2');
            $table->longText('register_yourself1');
            $table->longText('register_yourself2');
            $table->longText('search_job1');
            $table->longText('search_job2');
            $table->longText('get_a_client1');
            $table->longText('get_a_client2');
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
        Schema::dropIfExists('how_its_works_tbl');
    }
}
