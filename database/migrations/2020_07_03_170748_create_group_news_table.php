<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupNewsTable extends Migration
{
    public function up()
    {
        Schema::create('group_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('content');
            $table->date('published_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}