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
<<<<<<< HEAD
            $table->string('github')->unique();
            $table->string('email')->unique();
            $table->string('level');
            $table->string('proficiencies');
            $table->string('active_project');
            $table->string('resume_url');
            $table->nullableTimestamp('queue');
            $table->timestamps();
=======
            $table->string('name')->nullable();
            $table->string('nickname')->unique();
            $table->string('github_id')->unique();
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
>>>>>>> fc113eddc193a68ab9227a64ec056f341488f44d
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
