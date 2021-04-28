<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fos_7_a')->nullable();
            $table->string('request')->nullable();
            $table->string('evaluation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}