<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gender');
            $table->integer('age');
            $table->string('city');
            $table->string('tel_1');
            $table->string('tel_2')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('parent_name');
            $table->longText('hobbies')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
