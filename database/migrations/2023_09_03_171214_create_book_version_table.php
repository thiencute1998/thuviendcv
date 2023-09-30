<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_version', function (Blueprint $table) {
            $table->id();
            $table->integer('posts_id')->unsigned();
            $table->string('book_code',20)->nullable()->comment('Mã số');
            $table->string('book_publisher')->nullable()->comment('Nhà xuất bản');
            $table->string('book_yearpublication',5)->nullable()->comment('Năm xuất bản');
            $table->string('book_size',10)->nullable()->comment('Khổ sách');
            $table->integer('book_numberpages')->nullable()->comment('Số trang');
            $table->string('book_warehouse',20)->nullable()->comment('Kho sách');
            $table->tinyInteger('book_status')->nullable()->comment('Tình trạng');
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
        Schema::dropIfExists('book_version');
    }
}
