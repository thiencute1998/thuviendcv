<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorsymbolToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            //
            $table->string('book_authorsymbol',50)->nullable()->comment('Ký hiệu tác giả');
            $table->string('category_name',50)->nullable()->comment('DDC');
            $table->string('book_language')->nullable()->comment('Ngôn ngữ');
            $table->integer('book_number')->nullable()->comment('Số cuốn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            //
        });
    }
}
