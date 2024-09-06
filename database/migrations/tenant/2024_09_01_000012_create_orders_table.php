<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_2')->nullable();
            $table->longText('shipping_address')->nullable();
            $table->decimal('total_cost', 15, 2)->nullable();
            $table->decimal('shipping_cost', 15, 2)->nullable();
            $table->string('operating_status')->nullable();
            $table->string('cancel_reason')->nullable();
            $table->string('district')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
