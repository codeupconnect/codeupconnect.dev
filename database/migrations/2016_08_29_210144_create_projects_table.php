<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name');
            $table->string('site_url');
            $table->string('description');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('email');
            $table->string('status');
            $table->string('preferred_tech');
            $table->integer('phone');
            $table->integer('preferred_person');
            // $table->integer('created_by')->unsigned();
            // $table->foreign('created_by')->references('id')->on('users');
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
        //
    }
}
