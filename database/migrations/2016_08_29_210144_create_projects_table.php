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
<<<<<<< HEAD
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
=======
            $table->string('status');
            $table->integer('next_invite')->default(0)->nullable();
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
>>>>>>> fc113eddc193a68ab9227a64ec056f341488f44d
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
