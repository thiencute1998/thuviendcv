<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookBorrowDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_borrow_details', function (Blueprint $table) {
            $table->id();
            $table->integer('book_borrow_id')->index('book_borrow_details_book_borrow_id_index');;
            $table->string('book_code')->nullable();
            $table->string('book_name')->nullable();
            $table->integer('book_page')->nullable();
            $table->string('booK_ddc')->nullable();
            $table->string('book_author')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_borrow_details');
    }
}
