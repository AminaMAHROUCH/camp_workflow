<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGroupNewsTable extends Migration
{
    public function up()
    {
        Schema::table('group_news', function (Blueprint $table) {
            $table->unsignedInteger('responsible_id');
            $table->foreign('responsible_id', 'responsible_fk_1764698')->references('id')->on('group_responsibles');
        });
    }
}