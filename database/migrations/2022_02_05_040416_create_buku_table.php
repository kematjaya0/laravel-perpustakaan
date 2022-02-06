<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isbn', 20);
            $table->text('judul');
            $table->text('deskripsi');
            $table->integer('tahun');
            $table->integer('stok')->nullable();
            $table->string('image')->nullable();
            $table->integer('penulis_id');
            $table->foreign('penulis_id')->references('id')->on('penulis')
                   ->onDelete('cascade');
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
        Schema::dropIfExists('buku');
    }
}
