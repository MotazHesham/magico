<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price', 15, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('total_cost', 15, 2)->nullable();
            $table->text('colors')->nullable();
            $table->string('size')->nullable();
            $table->boolean('returned')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
