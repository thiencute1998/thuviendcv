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
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable()->comment('Anh bai viet');
            $table->text('content')->nullable()->comment('Noi dung');
            $table->integer('category_id')->nullable()->comment('ID danh muc');
            $table->integer('status')->nullable()->comment('1: Hoat dong, 0: Ko hoat dong');
            $table->tinyInteger('is_slide')->nullable()->comment('Co phai slide?');
            $table->integer('views')->nullable()->comment('So view bai viet');
            $table->string('author')->nullable()->comment('Tac gia bai viet');
            $table->string('title',150)->nullable();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->text('bookcontents')->nullable()->comment('Mục lục');
//            $table->string('book_subtitle',200)->nullable()->comment('Phụ đề');
//            $table->string('book_author',100)->nullable()->comment('Tác giả');
//            $table->string('book_authorsymbol',50)->nullable()->comment('Ký hiệu tác giả');
//            $table->string('category_name',50)->nullable()->comment('DDC');
//            $table->string('book_language')->nullable()->comment('Ngôn ngữ');
//            $table->integer('book_number')->nullable()->comment('Số cuốn');
//            $table->string('book_code',20)->nullable()->comment('Mã số');
//            $table->string('book_publisher')->nullable()->comment('Nhà xuất bản');
//            $table->string('book_yearpublication',5)->nullable()->comment('Năm xuất bản');
//            $table->string('book_size',10)->nullable()->comment('Khổ sách');
//            $table->integer('book_numberpages')->nullable()->comment('Số trang');
//            $table->string('book_warehouse',20)->nullable()->comment('Kho sách');
//            $table->tinyInteger('book_status')->nullable()->comment('Tình trạng');
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
