<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreativeWorksTable extends Migration
{
    public function up()
    {
        Schema::create('creative_works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
