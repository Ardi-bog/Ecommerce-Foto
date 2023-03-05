<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_vendor');
            $table->dateTime('waktu_awal');
            $table->dateTime('waktu_akhir');
            $table->string('keterangan');
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
