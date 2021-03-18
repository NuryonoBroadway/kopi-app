<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersKodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_kodes', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_pemesanan');
            $table->integer('user_id')->unsigned();
            $table->boolean('readed')->default(false);
            $table->boolean('process')->default(false);
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
        Schema::dropIfExists('orders_kodes');
    }
}
