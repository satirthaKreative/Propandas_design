<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyerToClientReviewTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyerToclientReview_tbls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reviewer_id');
            $table->integer('review_id');
            $table->longText('review_title');
            $table->longText('review_details');
            $table->tinyInteger('review_service_count');
            $table->tinyInteger('review_value_count');
            $table->tinyInteger('review_time_count');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('lawyerToclientReview_tbls');
    }
}
