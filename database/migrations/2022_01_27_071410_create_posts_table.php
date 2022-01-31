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
            $table->foreignId('image_id')->nullable()->constrained();
            $table->string('title');
//            $table->foreignId('language_id')->constrained();
            $table->text('language');
            $table->string('client');
            $table->date('date');
            $table->string('type');
            $table->string('industry');
            $table->string('website');
            $table->string('increase_traffic');
            $table->string('problem');
            $table->string('solution');
            $table->text('description');
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