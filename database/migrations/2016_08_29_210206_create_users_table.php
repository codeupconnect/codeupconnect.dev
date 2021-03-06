<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('nickname')->unique();
            $table->string('github_id')->unique();
            $table->string('trello_id')->nullable();
            $table->string("url")->unique();
            $table->string('email')->nullable()->unique();
            $table->boolean('is_admin');
            $table->boolean('is_freelancer');
            $table->string('queue')->default(null);
            $table->string('invite')->default(null);
            $table->string('proficiencies');
            $table->string('active_project');
            $table->string('resume_url');
            $table->nullableTimestamps();
            $table->string('avatar');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}