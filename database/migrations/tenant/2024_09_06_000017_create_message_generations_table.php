<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageGenerationsTable extends Migration
{
    public function up()
    {
        Schema::create('message_generations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('full_message')->nullable();
            $table->longText('response')->nullable();
            $table->integer('tokens')->nullable();
            $table->unsignedBigInteger('shift_id')->nullable();
            $table->foreign('shift_id', 'shift_fk_10100871')->references('id')->on('shifts');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_10100872')->references('id')->on('orders');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}