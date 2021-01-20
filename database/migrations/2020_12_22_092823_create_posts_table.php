<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->string('job_location')->nullable();
            $table->string('job_description')->nullable();
            $table->string('min_experience')->nullable();
            $table->integer('job_type_id')->nullable();
            $table->integer('job_skill_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('other_requirements')->nullable();
            $table->text('job_url')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
