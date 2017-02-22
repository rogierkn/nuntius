<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nuntius_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('body');
            $table->unsignedInteger('user_id');

            $table->boolean('published')->default(false);

            $table->timestamps();


            $className = config('nuntius.model.className');

            $tableName = (new $className)->getTable();
            $id = config('nuntius.model.identifier');


            $table->foreign('user_id')->references($id)->on($tableName);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nuntius_posts');
    }
}
