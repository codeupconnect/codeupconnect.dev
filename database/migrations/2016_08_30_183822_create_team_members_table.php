<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('role', 3);
<<<<<<< HEAD
=======
<<<<<<< HEAD:database/migrations/2016_08_29_210611_create_team_members_table.php
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('team');
=======
>>>>>>> 1098c934c4eb062f87a1ba8ffd22198f44f2b6cb
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
>>>>>>> fc113eddc193a68ab9227a64ec056f341488f44d:database/migrations/2016_08_30_183822_create_team_members_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('team_members');
    }
}
