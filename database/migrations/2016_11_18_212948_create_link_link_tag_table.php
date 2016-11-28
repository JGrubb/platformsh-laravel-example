<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkLinkTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_link_tag', function (Blueprint $table) {
            $table->integer('link_id')->unsigned()->nullable();
            $table->foreign('link_id')->references('id')
                ->on('links')->onDelete('cascade');
            $table->integer('link_tag_id')->unsigned()->nullable();
            $table->foreign('link_tag_id')->references('id')
                ->on('link_tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link_link_tag');
    }
}
