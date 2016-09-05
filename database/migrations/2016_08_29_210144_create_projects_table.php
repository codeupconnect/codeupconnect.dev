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
            $table->string('status');
            $table->string('trello_id');
            $table->string('organization_name');
            $table->string('site_url');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('point_person');
            $table->integer('phone');
            $table->string('email');
            $table->longText('project_details');
            $table->boolean('logo_graphics');
            $table->boolean('color_palette');
            $table->boolean('facebook');
            $table->boolean('linkedin');
            $table->boolean('twitter');
            $table->boolean('youtube');
            $table->boolean('instagram');
            $table->boolean('tumblr');
            $table->boolean('blog');
            $table->boolean('comments_feedback');
            $table->boolean('member_signup');
            $table->boolean('contact_form');
            $table->boolean('existing_database');
            $table->boolean('payment_donations');
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
