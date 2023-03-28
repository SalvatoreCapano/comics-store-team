<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->text('description', 4096)->nullable();
            $table->string('image', 256)->nullable();
            $table->float('price', 6, 2)->nullable();
            $table->bigInteger('quantity')->nullable();

            // $table->unsignedBigInteger('store_id');
            // $table->foreign('store_id')
            //     ->references('id')
            //     ->on('stores');

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
        Schema::dropIfExists('comics');
    }
};