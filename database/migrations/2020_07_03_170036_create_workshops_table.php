<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('content');
            $table->datetime('start_at');
            $table->datetime('end_at')->nullable();
            $table->string('quiz')->nullable();
            $table->string('evaluation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}