<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('students');

            $table->unsignedInteger('strand_id');
            $table->foreign('strand_id')->references('id')->on('strands');

            $table->unsignedInteger('klass_id');
            $table->foreign('klass_id')->references('id')->on('klasses');

            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->string('gender');
            $table->string('religion');
            $table->date('b_date');
            $table->string('mobile_num');
            $table->string('email');
            $table->text('current_address');
            $table->text('home_address');
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
        Schema::dropIfExists('students');
    }
}
