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
            $table->integer('next_invite')->default(0);
            $table->string('trello_id');
            $table->string('organization_name');
            $table->string('site_url');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('point_person');
            $table->integer('phone');
            $table->string('email');
            $table->longText('project_details');
            $table->boolean('collateral')->default(false);
            $table->boolean('facebook')->default(false);
            $table->boolean('linkedin')->default(false);
            $table->boolean('twitter')->default(false);
            $table->boolean('youtube')->default(false);
            $table->boolean('instagram')->default(false);
            $table->boolean('tumblr')->default(false);
            $table->boolean('blog')->default(false);
            $table->boolean('comments')->default(false);
            $table->boolean('member_signup')->default(false);
            $table->boolean('contact_form')->default(false);
            $table->boolean('existing_database')->default(false);
            $table->boolean('stripe')->default(false);
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
