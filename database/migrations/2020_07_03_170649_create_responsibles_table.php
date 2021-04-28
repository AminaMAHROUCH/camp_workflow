<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsiblesTable extends Migration
{
    public function up()
    {
        Schema::create('responsibles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tel_1');
            $table->string('tel_2')->nullable();
            $table->string('bank_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}