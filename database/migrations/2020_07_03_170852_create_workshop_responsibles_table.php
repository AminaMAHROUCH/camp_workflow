<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopResponsiblesTable extends Migration
{
    public function up()
    {
        Schema::create('workshop_responsibles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('city');
            $table->string('tel_1');
            $table->string('tel_2')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('bank_code');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}