<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('new_type')->nullable();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->longText('content')->nullable()->comment('Noi dung');
            $table->integer('view_count')->nullable()->comment('So luot xem');
            $table->string('author')->nullable()->comment('Tac gia');
            $table->integer('status')->nullable()->comment('1: Hoat dong, 0: Ko hoat dong');
            $table->string('title',150)->nullable();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('news');
    }
}
