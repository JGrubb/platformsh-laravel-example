<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropLinkTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('link_link_tag');
        Schema::dropIfExists('link_tags');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('link_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('link_link_tag', function (Blueprint $table) {
            $table->integer('link_id')->unsigned()->nullable();
            $table->foreign('link_id')->references('id')
                ->on('links')->onDelete('cascade');
            $table->integer('link_tag_id')->unsigned()->nullable();
            $table->foreign('link_tag_id')->references('id')
                ->on('link_tags')->onDelete('cascade');
        });
    }
}