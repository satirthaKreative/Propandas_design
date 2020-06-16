<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading')->nullable();
            $table->longText('academic_details')->nullable();
            $table->longText('association_certification')->nullable();
            $table->longText('address_proof')->nullable();
            $table->longText('identity_proof')->nullable();
            $table->longText('law_school_attendance')->nullable();
            $table->string('other_services')->nullable();
            $table->string('hourly_rate')->nullable();
            $table->string('work_like')->nullable();
            $table->string('law_country')->nullable();
            $table->longText('languages')->nullable();
            $table->longText('bank_fname');
            $table->longText('bank_lname');
            $table->LongText('bank_bic');
            $table->LongText('bank_iban');
            $table->tinyInteger('user_id'); // active
            $table->tinyInteger('active_status')->default(1); // active
            $table->tinyInteger('status')->default(1); // active
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
        Schema::dropIfExists('academic_models');
    }
}
