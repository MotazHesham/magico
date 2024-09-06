<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('cost', 15, 2)->default(0);
            $table->string('code')->nullable();
            $table->text('predictions')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
