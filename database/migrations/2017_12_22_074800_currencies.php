<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Currencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbol', 20);
            $table->string('name');
            $table->string('symbol_native', 20);
            $table->integer('decimal_digits');
            $table->integer('rounding');
            $table->string('code', 20);
            $table->string('name_plural');
            $table->double('base_currency_rate', 10, 2);
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
         Schema::dropIfExists('currencies');
    }
}
