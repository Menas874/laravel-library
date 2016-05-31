<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('resource_tag', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('resource_id')->unsigned();
          $table->integer('tag_id')->unsigned();

          $table->foreign('resource_id')
                ->references('id')
                ->on('resources')->onDelete('cascade');

          $table->foreign('tag_id')
                ->references('id')
                ->on('tags')->onDelete('cascade');

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
        Schema::drop('resource_tag');
        Schema::drop('tags');
    }
}
