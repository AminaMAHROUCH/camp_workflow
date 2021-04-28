<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToResponsibleNewsTable extends Migration
{
    public function up()
    {
        Schema::table('responsible_news', function (Blueprint $table) {
            $table->unsignedInteger('responsible_id');
            $table->foreign('responsible_id', 'responsible_fk_1764703')->references('id')->on('responsibles');
        });
    }
}