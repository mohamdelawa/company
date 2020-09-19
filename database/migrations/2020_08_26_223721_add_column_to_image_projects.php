<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToImageProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_projects', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_project_id');
            $table->foreign('profile_project_id')->references('id')->on('profile_projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_projects', function (Blueprint $table) {
            //
        });
    }
}
