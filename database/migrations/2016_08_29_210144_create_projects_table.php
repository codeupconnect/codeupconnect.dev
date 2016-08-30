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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name');
            $table->string('site_url');
            $table->longText('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('email');
            $table->string('status');
            $table->longText('preferred_tech');
            $table->integer('phone');
            $table->string('point_person');
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
        Schema::drop('projects');
    }
}
