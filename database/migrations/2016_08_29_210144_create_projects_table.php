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
            $table->string('client_name', 50);
            $table->string('site_url');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('email')->unique();;
            $table->string('status');
            $table->string('preferred_tech', 100);
            $table->integer('phone');
            $table->integer('preferred_person');
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
